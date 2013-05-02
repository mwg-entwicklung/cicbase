<?php
// DO NOT CHANGE THIS FILE! It is automatically generated by extdeveval::buildAutoloadRegistry.
// This file was generated on 2012-12-10 15:16

$extensionPath = t3lib_extMgm::extPath('cicbase');
$extensionClassesPath = $extensionPath . 'Classes/';
return array(
	'tx_cicbase_command_examplecommandcontroller' => $extensionClassesPath . 'Command/ExampleCommandController.php',
	'tx_cicbase_controller_controller' => $extensionClassesPath . 'Controller/Controller.php',
	'tx_cicbase_domain_model_address' => $extensionClassesPath . 'Domain/Model/Address.php',
	'tx_cicbase_domain_model_digitalasset' => $extensionClassesPath . 'Domain/Model/DigitalAsset.php',
	'tx_cicbase_domain_model_file' => $extensionClassesPath . 'Domain/Model/File.php',
	'tx_cicbase_domain_model_latlng' => $extensionClassesPath . 'Domain/Model/LatLng.php',
	'tx_cicbase_domain_model_salesforcelead' => $extensionClassesPath . 'Domain/Model/SalesforceLead.php',
	'tx_cicbase_domain_model_state' => $extensionClassesPath . 'Domain/Model/State.php',
	'tx_cicbase_domain_model_zip' => $extensionClassesPath . 'Domain/Model/Zip.php',
	'tx_cicbase_domain_repository_digitalassetrepository' => $extensionClassesPath . 'Domain/Repository/DigitalAssetRepository.php',
	'tx_cicbase_domain_repository_filerepository' => $extensionClassesPath . 'Domain/Repository/FileRepository.php',
	'tx_cicbase_domain_repository_staterepository' => $extensionClassesPath . 'Domain/Repository/StateRepository.php',
	'tx_cicbase_domain_repository_ziprepository' => $extensionClassesPath . 'Domain/Repository/ZipRepository.php',
	'tx_cicbase_factory_filefactory' => $extensionClassesPath . 'Factory/FileFactory.php',
	'tx_cicbase_formhandler_finisher_salesforce' => $extensionClassesPath . 'Formhandler/Finisher/Tx_Cicbase_Formhandler_Finisher_Salesforce.php',
	'tx_cicbase_formhandler_interceptor_fieldchanger' => $extensionClassesPath . 'Formhandler/Interceptor/Tx_Cicbase_Formhandler_Interceptor_FieldChanger.php',
	'tx_cicbase_formhandler_interceptor_maxmindlocator' => $extensionClassesPath . 'Formhandler/Interceptor/Tx_Cicbase_Formhandler_Interceptor_MaxMindLocator.php',
	'tx_cicbase_formhandler_interceptor_searchenginequerygrabber' => $extensionClassesPath . 'Formhandler/Interceptor/Tx_Cicbase_Formhandler_Interceptor_SearchEngineQueryGrabber.php',
	'tx_cicbase_formhandler_interceptor_conditionalfieldchanges' => $extensionClassesPath . 'Formhandler/Interceptor/Tx_Cicbase_Formhandler_Interceptor_ConditionalFieldChanges.php',
	'tx_cicbase_persistence_repository' => $extensionClassesPath . 'Persistence/Repository.php',
	'tx_cicbase_property_typeconverter_file' => $extensionClassesPath . 'Property/TypeConverter/File.php',
	'tx_cicbase_scheduler_abstracttask' => $extensionClassesPath . 'Scheduler/AbstractTask.php',
	'tx_cicbase_scheduler_fieldprovider' => $extensionClassesPath . 'Scheduler/FieldProvider.php',
	'tx_cicbase_scheduler_task' => $extensionClassesPath . 'Scheduler/Task.php',
	'tx_cicbase_service_controllersecurityservice' => $extensionClassesPath . 'Service/ControllerSecurityService.php',
	'tx_cicbase_service_emailservice' => $extensionClassesPath . 'Service/EmailService.php',
	'tx_cicbase_service_emailserviceinterface' => $extensionClassesPath . 'Service/EmailServiceInterface.php',
	'tx_cicbase_service_geolocationservice' => $extensionClassesPath . 'Service/GeolocationService.php',
	'tx_cicbase_service_jsonobjectservice' => $extensionClassesPath . 'Service/JsonObjectService.php',
	'tx_cicbase_service_yamlparserservice' => $extensionClassesPath . 'Service/YamlParserService.php',
	'tx_cicbase_validation_validator_emailaddressallowemptyvalidator' => $extensionClassesPath . 'Validation/Validator/EmailAddressAllowEmptyValidator.php',
	'tx_cicbase_viewhelpers_addslashesviewhelper' => $extensionClassesPath . 'ViewHelpers/AddSlashesViewHelper.php',
	'tx_cicbase_viewhelpers_complexifviewhelper' => $extensionClassesPath . 'ViewHelpers/ComplexIfViewHelper.php',
	'tx_cicbase_viewhelpers_file_linkviewhelper' => $extensionClassesPath . 'ViewHelpers/File/LinkViewHelper.php',
	'tx_cicbase_viewhelpers_forchunkviewhelper' => $extensionClassesPath . 'ViewHelpers/ForChunkViewHelper.php',
	'tx_cicbase_viewhelpers_forcommalistviewhelper' => $extensionClassesPath . 'ViewHelpers/ForCommaListViewHelper.php',
	'tx_cicbase_viewhelpers_form_selectviewhelper' => $extensionClassesPath . 'ViewHelpers/Form/SelectViewHelper.php',
	'tx_cicbase_viewhelpers_format_crophtmlviewhelper' => $extensionClassesPath . 'ViewHelpers/CropHtmlViewHelper.php',
	'tx_cicbase_viewhelpers_format_currencyviewhelper' => $extensionClassesPath . 'ViewHelpers/Format/CurrencyViewHelper.php',
	'tx_cicbase_viewhelpers_format_uppercaseviewhelper' => $extensionClassesPath . 'ViewHelpers/Format/UpperCaseViewHelper.php',
	'tx_cicbase_viewhelpers_ifformwassubmittedviewhelper' => $extensionClassesPath . 'ViewHelpers/IfFormWasSubmittedViewHelper.php',
	'tx_cicbase_viewhelpers_imageresourceviewhelper' => $extensionClassesPath . 'ViewHelpers/ImageResourceViewHelper.php',
	'tx_cicbase_viewhelpers_includejavascriptstringviewhelper' => $extensionClassesPath . 'ViewHelpers/IncludeJavascriptStringViewHelper.php',
	'tx_cicbase_viewhelpers_includejavascriptviewhelper' => $extensionClassesPath . 'ViewHelpers/IncludeJavascriptViewHelper.php',
	'tx_cicbase_viewhelpers_includestylesheetviewhelper' => $extensionClassesPath . 'ViewHelpers/IncludeStylesheetViewHelper.php',
	'tx_cicbase_viewhelpers_jsonbootstrapviewhelper' => $extensionClassesPath . 'ViewHelpers/JsonBootstrapViewHelper.php',
	'tx_cicbase_viewhelpers_lastimageresourceinfoviewhelper' => $extensionClassesPath . 'ViewHelpers/LastImageResourceInfoViewHelper.php',
	'tx_cicbase_viewhelpers_lengthviewhelper' => $extensionClassesPath . 'ViewHelpers/LengthViewHelper.php',
	'tx_cicbase_viewhelpers_metatagviewhelper' => $extensionClassesPath . 'ViewHelpers/MetaTagViewHelper.php',
	'tx_cicbase_viewhelpers_rawviewhelper' => $extensionClassesPath . 'ViewHelpers/RawViewHelper.php',
	'tx_cicbase_viewhelpers_relativetimeviewhelper' => $extensionClassesPath . 'ViewHelpers/RelativeTimeViewHelper.php',
	'tx_cicbase_viewhelpers_string_possessiveviewhelper' => $extensionClassesPath . 'ViewHelpers/String/PossessiveViewHelper.php',
	'tx_cicbase_viewhelpers_striplinebreaksviewhelper' => $extensionClassesPath . 'ViewHelpers/StripLinebreaksViewHelper.php',
	'tx_cicbase_viewhelpers_switchviewhelper' => $extensionClassesPath . 'ViewHelpers/SwitchViewHelper.php',
	'tx_cicbase_viewhelpers_titleviewhelper' => $extensionClassesPath . 'ViewHelpers/TitleViewHelper.php',
	'tx_cicbase_viewhelpers_typolinkviewhelper' => $extensionClassesPath . 'ViewHelpers/TypolinkViewHelper.php',
	'tx_cicbase_viewhelpers_urlencodeviewhelper' => $extensionClassesPath . 'ViewHelpers/UrlEncodeViewHelper.php',
	'tx_cicbase_viewhelpers_widget_controller_fileuploadcontroller' => $extensionClassesPath . 'ViewHelpers/Widget/Controller/FileUploadController.php',
	'tx_cicbase_viewhelpers_widget_controller_paginatecontroller' => $extensionClassesPath . 'ViewHelpers/Widget/Controller/PaginateController.php',
	'tx_cicbase_viewhelpers_widget_fileuploadviewhelper' => $extensionClassesPath . 'ViewHelpers/Widget/FileUploadViewHelper.php',
	'tx_cicbase_viewhelpers_widget_paginateviewhelper' => $extensionClassesPath . 'ViewHelpers/Widget/PaginateViewHelper.php',
);
?>
