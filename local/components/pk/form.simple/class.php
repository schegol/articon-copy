<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Application;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;

define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");

class CPKFormSimple extends CBitrixComponent implements Controllerable
{

    function fileDump(&$arFields,$paramName = "arrName"){
        AddMessage2Log($paramName.' = '.print_r($arFields, true),'');
    }

	public function onPrepareComponentParams($arParams)
    {
        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();

        if ($request['field'] and $request['value'] and !$arParams['READ_FIELD'] and !$arParams['READ_VALUE']) {
            $arParams['READ_FIELD'] = $request['field'];
            $arParams['READ_VALUE'] = $request['value'];
        }

        if (!isset($arParams['PROPERTY']))
            $arParams['PROPERTY'] = array();

		return $arParams;
	}
	
	/**
	 * @return array
	 */
	public function configureActions()
	{
		return [
			'submit' => [
				'prefilters' => [
					/*new ActionFilter\Authentication()*/
				],
				'postfilters' => []
			]
		];
	}
	
    public function executeComponent()
    {
		if (!$this->arParams['IBLOCK_ID']) {
            return;
        }

		\Bitrix\Main\Loader::IncludeModule("iblock");

        Asset::getInstance()->addJs($this->getPath(). "/script.js");

		$arResult = array();

        $res = CIBlock::GetByID($this->arParams['IBLOCK_ID']);
        if($ar_res = $res->GetNext()) {
            if ($ar_res['IBLOCK_TYPE_ID'] != 'forms') {
                echo Loc::getMessage("IBLOCK_TYPE_ERROR");
                return false;
            }
            $arResult['FORM_NAME'] = $ar_res['NAME'];
            $arResult['FORM_DESCRIPTION'] = $ar_res['DESCRIPTION'];
        }
        else
            return false;

        $db = \Bitrix\Iblock\PropertyTable::getList(
            [
                'filter'=> ["ACTIVE"=>"Y", "IBLOCK_ID"=>$this->arParams['IBLOCK_ID']],
                'order' => ["sort"=>"asc", "name"=>"asc"]
            ]
        );
        while ($prop_fields = $db->fetch())
        {
            if ($prop_fields['PROPERTY_TYPE'] == 'L') {
                $dbSection = \Bitrix\Iblock\SectionPropertyTable::getList(
                    [
                        'filter'=> ["PROPERTY_ID"=>$prop_fields['ID']]
                    ]
                );
                if ($section_prop_fields = $dbSection->fetch()){
                    if ($section_prop_fields['DISPLAY_TYPE']) {
                        $prop_fields['PROPERTY_TYPE'] = $prop_fields['PROPERTY_TYPE'].$section_prop_fields['DISPLAY_TYPE'];
                    }
                }

                $property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>$this->arParams['IBLOCK_ID'], "CODE"=>$prop_fields['CODE']));
                while($enum_fields = $property_enums->GetNext())
                {
                    $prop_fields['VALUES'][$enum_fields["ID"]] = $enum_fields["VALUE"];
                }
            }
            $arResult['formFields'][$prop_fields['CODE']] = $prop_fields;
            $this->arParams['PROPERTY'][] = $prop_fields['CODE'];
            if ($prop_fields['IS_REQUIRED'] == 'Y')
                $this->arParams['REQUIRED'][] = $prop_fields['CODE'];

        }
        $this->arResult = $arResult;
		$context = Application::getInstance()->getContext();
		$request = $context->getRequest();
        $submit = self::clean($request['submit']);
        if ($submit)
        {
            $result = $this->submitAction();
            $arResult['data'] = $result['data'];
            if ($result['error'])
            {
                $arResult['error'] = $result['error'];
            }
            else
            {
                if ($this->arParams['AJAX'] != 'Y') {
                    LocalRedirect(strtok($_SERVER['REQUEST_URI'], "?").'?result='.$result['result']);
                }
                unset($arResult['data']);
                $arResult['result'] = (int)$result['result'];
            }
        }

        if ($this->arParams['READ_FIELD'] and $this->arParams['READ_VALUE'] and $arResult['formFields'][$this->arParams['READ_FIELD']]) {
            $arResult['data']['property'][$this->arParams['READ_FIELD']] = $this->arParams['READ_VALUE'];
            $arResult['formFields'][$this->arParams['READ_FIELD']]['notedit'] = 'Y';
        }

        if ((int)$request['result'])
            $arResult['result'] = (int)$request['result'];

        global $APPLICATION;
        if ($this->arParams['LOAD_JS_CSS'] == 'Y' or ($submit and $this->arParams['AJAX'] == 'Y')) {
            //$APPLICATION->ShowHead();
            //$this->addExternalJS($componentPath . "/script.js");
            //Bitrix\Main\Page\Asset::getInstance()->addJs(__DIR__. "/script.js");
        }

		$this->arResult = $arResult;
		$this->includeComponentTemplate();


    }

	
	function submitAction()
	{
		$context = Application::getInstance()->getContext();
		$request = $context->getRequest();

		if (!$this->arParams['IBLOCK_ID']) {
            $request->addFilter(new \Bitrix\Main\Web\PostDecodeFilter);
            $signer = new \Bitrix\Main\Security\Sign\Signer;
            try
            {
                $signedParamsString = $request->get('signedParamsString') ?: '';
                $params = $signer->unsign($signedParamsString, 'form.simple');
                $this->arParams = unserialize(base64_decode($params));
            }
            catch (\Bitrix\Main\Security\Sign\BadSignatureException $e)
            {
                var_dump($e->getMessage());
                die();
            }
        }

        $arFiles = $request->getFileList();

        $result = array();
        foreach ($this->arParams['PROPERTY'] as $prop) {
            if ($this->arResult['formFields'][$prop]['PROPERTY_TYPE'] == 'F' and $arFiles[$prop]) {

                $files = $this->getLoadFile($prop, $arFiles[$prop]);
                if ($files['error'])
                    $result['error'][$prop] = implode("<br>", $files['error']);
                else
                    $data['property'][$prop] = $files['files'];
            } elseif (isset($request[$prop])) {
                if (is_array($request[$prop]))
                    $data['property'][$prop] = $request[$prop];
                elseif ($this->arResult['formFields'][$prop]['USER_TYPE'] == 'HTML')
                    $data['property'][$prop] = Array("VALUE" => Array ("TEXT" => self::clean($request[$prop]), "TYPE" => "text"));
                else
                    $data['property'][$prop] = self::clean($request[$prop]);
            }

            if (in_array($prop, $this->arParams['REQUIRED']) and !$data['property'][$prop])
                $result['error'][$prop] = 'Заполните поле '.$this->arResult['formFields'][$prop]['NAME'];
        }
        if ($this->arParams['SOGLASIE'] == 'Y') {
            $data['SOGLASIE'] = $request['SOGLASIE'];
            if ($request['SOGLASIE'] != 'Y')
                $result['error']['req_SOGLASIE'] = 'Примите согласие';
        }
        $result['data'] = $data;
		if ($result['error'])
		{
			return $result;	
		}

		$res = $this->saveData($data);
        $result = array_merge($result, $res);
		
		return $result;
	}

    function getLoadFile($prop, $files) {
        $result = [];
        if ($this->arResult['formFields'][$prop]['FILE_TYPE']) {
            $res = CFile::CheckFile($files, 0, false, $this->arResult['formFields'][$prop]['FILE_TYPE']);
            if (strlen($res) > 0) {
                $result['error'][] = $res;
            }
        }

        $result['files'][$prop] = $files;
        return $result;
        foreach ($prop as  $key => $file) {
            /*$file = [
                'type' => $files['type'][$key],
                'tmp_name' => $files['tmp_name'][$key],
                'name' => $files['name'][$key],
                'size' => $files['size'][$key]
            ];*/

           /// $result['files'][$key] = $file;

            continue;

            if(!in_array($this->getExtension3($file['name']), $whitelist)) {
                $result['error'][] = 'Некорректный файл!!';
                continue;
            }
            if ($file['size'] > 0 and ($file['type'] == 'application/pdf' or in_array($imageinfo['mime'], array("image/png", "image/jpeg"))))
            {
                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/upload/tmp';
                $arFile[] = array();
                move_uploaded_file( $file['tmp_name'], "$uploaddir/".$file['name']);
                // Уменьшаем картинку
                $tmpFilePath = $_SERVER['DOCUMENT_ROOT']."/upload/tmp/resize/".$file['name'];
                if ($file['type'] != 'application/pdf') {
                    /*$resizeRez = CFile::ResizeImageFile( // уменьшение картинки для превью
                        $source = "$uploaddir/" . $file['name'],
                        $dest = $tmpFilePath,
                        array(
                            'width' => 800,
                            'height' => 2000
                        ),
                        $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL, // метод ресайза
                        $waterMark = array(), // водяной знак (пустой)
                        $jpgQuality = 95 // качество уменьшенной картинки в процентах
                    );
                    if ($resizeRez)
                        $newimg = $tmpFilePath;
                    else*/
                    $newimg = "$uploaddir/" . $file['name'];
                }
                else
                    $newimg =  "$uploaddir/".$file['name'];
                $result['files'][] = array("VALUE" => CFile::MakeFileArray($newimg),"DESCRIPTION"=>'');

                //unlink("$uploaddir/".$file['name']);
                unlink($tmpFilePath);

            }
            else
            {
                $result['error'][] = 'Некорректный файл!!';
                continue;
            }
        }
    }

	function saveData($data)
    {

        CModule::IncludeModule("iblock");
        global $USER;
        if (!$data['NAME'])
            $data['NAME'] = 'Заявка от '.date("d.m.Y");
        $newFields = Array(
            "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
            "IBLOCK_ID"      => $this->arParams['IBLOCK_ID'],
            "PROPERTY_VALUES"=> $data['property'],
            "NAME"           => $data['NAME'],
            "ACTIVE"         => "Y",            // активен
        );
        //return $newFields;
        $el = new CIBlockElement;

        if($ID = $el->Add($newFields)) {
            $result['result'] = $ID;
            $this->sendToRoistat($data);
            $this->sendMail($data);
        } else {
            $result['error'][] = $el->LAST_ERROR;
        }
        return $result;
    }

    function sendMail($data) {
        $arEventFields = array(
            "FORM_NAME" => $this->arParams['FORM_NAME'],
        );
        if($data['NAME']) {
            $arEventFields['NAME'] = $data['NAME'];
        }

        if($data['property'])
            $arEventFields['PROPS'] = $this->getProps($data['property']);

        $arrSITE =  SITE_ID;

        CEvent::Send("PK_FORM_TO_ADMIN", $arrSITE, $arEventFields);
        /*  $this->fileDump($data); */
        if($data['property']['EMAIL']) {
            $arEventFields['EMAIL'] = $data['property']['EMAIL'];
            CEvent::Send("PK_SEND_USER_FORM", $arrSITE, $arEventFields);
        }
    }

    function sendToRoistat($data)
    {
        $roistat_key = Option::get('pk.m1', 'ROISTAT_KEY', "", SITE_ID);
        if ($roistat_key) {
            $roistatData = array(
                'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : null,
                'key' => $roistat_key,
                'title' => 'Заявка с формы ' . $this->arResult['FORM_NAME'],
                'name' => $data['property']["FIO"],
                'phone' => $data['property']["PHONE"],
                'email' => $data['property']["EMAIL"],
            );

            if ($_COOKIE['roistat_visit'])
                file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));
        }
    }

  function getProps($property)
  {
      $mail_props = '';
      foreach ($property as $k => $props) {

          $prop_fields = $this->arResult['formFields'][$k];
          $props_val = '';
          if (is_array($prop_fields['USER_TYPE_SETTINGS']) && $prop_fields['USER_TYPE_SETTINGS']['TABLE_NAME']) {
              $sTableName = $prop_fields['USER_TYPE_SETTINGS']['TABLE_NAME'];
              if (is_array($props)) {

                  foreach ($props as $prop) {
                      if (is_array($prop)) {
                          foreach ($prop as $p => $v) {
                              if ($p !== 'TYPE') {
                                  $props_val .= $v . ' ';
                              }
                          }
                      } else {
                          $props_val .= $this->getHlValue($sTableName, $prop) . ', ';
                      }
                  }

              } else {
                  $props_val = $this->getHlValue($sTableName, $props);
              }

              $mail_props .= $prop_fields['NAME'] . ': ' . $props_val . '<br>';

              } elseif (in_array($prop_fields['PROPERTY_TYPE'], ['L', 'LK', 'LP', 'LF'])) {
                  if (is_array($props)) {
                      foreach ($props as $prop) {
                          $props_val .= $prop_fields['VALUES'][$prop] . ', ';
                      }
                  } else {
                      $props_val = $prop_fields['VALUES'][$props];
                  }
                  $mail_props .= $prop_fields['NAME'] . ': ' . $props_val . '<br>';
              } else {

                  if (is_array($props)) {

                      foreach ($props as $name => $prop) {
                          if (is_array($prop)) {
                              foreach ($prop as $p => $v) {
                                  if ($p !== 'TYPE') {
                                      $props_val .= $v . ' ';
                                  }
                              }
                          } else {
                              $props_val .= $prop . ', ';
                          }
                      }

                  } else {
                      $props_val = $props;
                  }

              $mail_props .= $prop_fields['NAME'] . ': ' . $props_val . '<br>';
          }
    }

    return $mail_props;
  }

    function getHlValue($sTableName, $arHighloadProperty) {

        if ( Loader::IncludeModule('highloadblock') && !empty($sTableName) && !empty($arHighloadProperty) )
        {
            $hlblock = HL\HighloadBlockTable::getRow([
                'filter' => [
                    '=TABLE_NAME' => $sTableName
                ],
            ]);

            if ( $hlblock )
            {
                $entity      = HL\HighloadBlockTable::compileEntity( $hlblock );
                $entityClass = $entity->getDataClass();

                $arRecords = $entityClass::getList([
                    'filter' => [
                        'UF_XML_ID' => $arHighloadProperty
                    ],
                ]);
                foreach ($arRecords as $record)
                {
                    $val = $record['UF_NAME'];
                }

                return $val;

            }
        }

    }

    public static function clean($value = "") {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }
}
?>