<?php

declare(strict_types=1);
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\AdditionalFeatures\ListCustomerCustomPropertiesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Calls\ListCallsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Clients\CreateCustomerResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Clients\DeleteCustomerResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Clients\GetCustomerResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Clients\ListCustomersResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Clients\UpdateCustomerResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\ClientTimeline\CreateCustomerFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\ClientTimeline\DeleteCustomerFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\ClientTimeline\ListCustomerFeedResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\ClientTimeline\UpdateCustomerFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\DealFeed\CreateDealFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\DealFeed\DeleteDealFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\DealFeed\ListDealFeedResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\DealFeed\UpdateDealFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals\CreateDealResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals\DeleteDealResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals\GetDealResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals\ListDealsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals\UpdateDealResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Employees\CreateCustomerEmployeeResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Employees\DeleteCustomerEmployeeResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Employees\GetCustomerEmployeeResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Employees\ListCustomerEmployeesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Employees\UpdateCustomerEmployeeResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Files\GetFileResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\GeneralizedContacts\IdentifyContactResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\GeneralizedContacts\ListContactsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Labels\CreateCustomerLabelResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Labels\DeleteCustomerLabelResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Labels\ListCustomerLabelsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads\CreateLeadResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads\DeleteLeadResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads\GetLeadResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads\ListLeadsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads\UpdateLeadResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\SourceTags\CreateCustomerUtmResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\SourceTags\DeleteCustomerUtmResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\SourceTags\ListCustomerUtmsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\SourceTags\UpdateCustomerUtmResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks\CloseEventResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks\CreateEventResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks\DeleteEventResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks\GetEventResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks\ListEventsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks\UpdateEventResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users\GetUserResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users\GetUserWorkingHoursResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users\ListUserGroupsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\CreateGroupResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\GetGroupResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\ListFilesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\ListGroupsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\UpdateGroupResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\UploadDocumentResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\ValidateGroupResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Esim\CreateOrderResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Esim\GetOrderResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Esim\ListDevicesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Esim\ListOrdersResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Esim\ListPackagesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\CheckNumberResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\GetBalanceResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\GetPriceResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\GetTariffResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\GetTimezoneResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\ListCurrenciesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\ListLanguagesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\ListTariffsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\LookupNumberResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\RequestCallbackResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\CreatePbxResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\CreateRedirectionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\DeleteCallInfoUrlResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\DeleteRecordRequestResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\DeleteWaitMelodyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\DeleteWebhooksUrlResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\GetCallInfoResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\GetRedirectionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\GetWebhooksResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\RequestRecordResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\SetCallInfoNotificationsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\SetCallInfoUrlResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\SetWebhookHooksResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\SetWebhooksUrlResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\SwitchWaitMelodyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\UploadWaitMelodyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\CreateExtensionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\EditExtensionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\GetExtensionInfoResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\GetExtensionPasswordResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\GetExtensionStatusResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\ListExtensionsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\UpdateExtensionPasswordResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\UpdateRecordingResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\CreateIvrResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\CreateScenarioResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\DeleteIvrResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\DeleteScenarioResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\DeleteSoundResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\EditScenarioResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\GetScenarioResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\ListIvrResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\ListSoundsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\UploadSoundResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\AddUserPhoneResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\ConfirmPhoneResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\ConfirmUserRegistrationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\CreateUserApiKeyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\FindUserResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\GetAccountInfoResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\GetUserApiKeyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\ListUserPhonesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\ListUsersResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\ProvePhoneByCallbackResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\ProvePhoneBySmsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\RegisterUserResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\TopUpUserResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\TransferMoneyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller\UpdateUserPhoneResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\CreateSipResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\GetSipStatusResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\ListSipNumbersResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\SwitchRedirectionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\UpdateCallerIdResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\UpdateRedirectionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\UpdateSipPasswordResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sms\ListSenderIdsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sms\ListTemplatesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sms\SendSmsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\SpeechRecognition\GetSpeechRecognitionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\SpeechRecognition\UpdateSpeechRecognitionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Statistics\GetCallbackWidgetStatisticsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Statistics\GetIncomingCallsStatisticsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Statistics\GetPbxStatisticsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Statistics\GetStatisticsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Verify\CheckVerificationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Verify\CreateVerificationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\CheckWrongsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\GetAutoprolongationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\GetCountryResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\GetDirectNumberResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\GetIncomingChannelsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\ListAvailableNumbersResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\ListCountriesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\ListDirectNumbersResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\OrderNumberResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\ProlongNumberResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\ReceiveSmsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\SetCallerNameResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\SetSipIdResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\UpdateAutoprolongationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\UpdateIncomingChannelsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\AddDomainResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\CreateIntegrationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\DeleteDomainResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\DeleteIntegrationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\GetIntegrationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\GetKeyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\UpdateIntegrationResponseData;

return [
    ListCustomerCustomPropertiesResponseData::class => [
        'customProperties' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    ListCallsResponseData::class => [
        'calls' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    CreateCustomerFeedItemResponseData::class => [
        'attached_files' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'content' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'time' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'user_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'user_name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    DeleteCustomerFeedItemResponseData::class => [
    ],
    ListCustomerFeedResponseData::class => [
        'items' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    UpdateCustomerFeedItemResponseData::class => [
    ],
    CreateCustomerResponseData::class => [
        'customer' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    DeleteCustomerResponseData::class => [
    ],
    GetCustomerResponseData::class => [
        'address' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'city' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'comment' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'contacts' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'country' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'created_at' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'created_by' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'custom_properties' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'employees_count' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'labels' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'lead_created_at' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'lead_created_by' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'lead_source' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'phones' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'responsible_user_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'utms' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'website' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'zip' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ListCustomersResponseData::class => [
        'address' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'city' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'comment' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'contacts' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'country' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'created_at' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'created_by' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'custom_properties' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'employees_count' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'labels' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'lead_created_at' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'lead_created_by' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'lead_source' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'phones' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'responsible_user_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'utms' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'website' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'zip' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    UpdateCustomerResponseData::class => [
        'customer' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    CreateDealFeedItemResponseData::class => [
        'attached_files' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'content' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'time' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'user_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'user_name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    DeleteDealFeedItemResponseData::class => [
    ],
    ListDealFeedResponseData::class => [
        'items' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    UpdateDealFeedItemResponseData::class => [
    ],
    CreateDealResponseData::class => [
        'deal' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    DeleteDealResponseData::class => [
    ],
    GetDealResponseData::class => [
        'budget' => [
            'kind' => 'scalar',
            'type' => 'float',
        ],
        'created_at' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'created_by' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'currency' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'customer_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'customer_is_lead' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'customer_name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'customer_responsible_user' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'responsible_user' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'title' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ListDealsResponseData::class => [
        'deals' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    UpdateDealResponseData::class => [
        'deal' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    CreateCustomerEmployeeResponseData::class => [
        'employee' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    DeleteCustomerEmployeeResponseData::class => [
    ],
    GetCustomerEmployeeResponseData::class => [
        'comment' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'contacts' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'customer_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'phones' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'position' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'position_title' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ListCustomerEmployeesResponseData::class => [
        'employees' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    UpdateCustomerEmployeeResponseData::class => [
        'employee' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetFileResponseData::class => [
    ],
    IdentifyContactResponseData::class => [
        'avatar' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'contact_type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'customer' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'group' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'phone' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'position' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'responsible' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'role' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ListContactsResponseData::class => [
        'avatar' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'contact_type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'contacts' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'customer' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'group' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'phone' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'position' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'responsible' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'role' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    CreateCustomerLabelResponseData::class => [
        'count' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'label' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    DeleteCustomerLabelResponseData::class => [
    ],
    ListCustomerLabelsResponseData::class => [
        'labels' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    CreateLeadResponseData::class => [
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'lead' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    DeleteLeadResponseData::class => [
    ],
    GetLeadResponseData::class => [
        'address' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'city' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'comment' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'contacts' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'country' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'custom_properties' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'employees_count' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'labels' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'lead_created_at' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'lead_created_by' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'lead_source' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'lead_status' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'phones' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'responsible_user_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'utms' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'website' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'zip' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ListLeadsResponseData::class => [
        'leads' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'uncategorizedCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    UpdateLeadResponseData::class => [
        'lead' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    CreateCustomerUtmResponseData::class => [
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'utm' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    DeleteCustomerUtmResponseData::class => [
    ],
    ListCustomerUtmsResponseData::class => [
        'items' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    UpdateCustomerUtmResponseData::class => [
        'utm' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    CloseEventResponseData::class => [
    ],
    CreateEventResponseData::class => [
        'event' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    DeleteEventResponseData::class => [
    ],
    GetEventResponseData::class => [
        'allDay' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'call_done' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'completed' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'completed_comment' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'created_by' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'customers' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'description' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'end' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'members' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'phone' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'responsible_user' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'start' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'title' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ListEventsResponseData::class => [
        'events' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    UpdateEventResponseData::class => [
        'event' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetUserResponseData::class => [
        'avatar' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'color' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'color_hex' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'contacts' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'created_at' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'device' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'email' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'enabled' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'first_day' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'group_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'internal_number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'is_superadmin' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'language' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'pending_email_change_request' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'phone_widget_location' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'phones' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'role' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'timezone' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    GetUserWorkingHoursResponseData::class => [
        'customWorkingHours' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'scheduleFixes' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'schedulePeriod' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'scheduleWorkingHours' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListUserGroupsResponseData::class => [
        'groups' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users\ListUsersResponseData::class => [
        'totalCount' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'users' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    CreateGroupResponseData::class => [
        'group' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetGroupResponseData::class => [
        'group' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    ListFilesResponseData::class => [
        'documents' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListGroupsResponseData::class => [
        'groups' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    UpdateGroupResponseData::class => [
        'group' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    UploadDocumentResponseData::class => [
        'doc_name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ValidateGroupResponseData::class => [
        'is_address_match' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'is_documents_uploaded' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'is_documents_verified' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'is_information_match' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
    ],
    CreateOrderResponseData::class => [
        'order' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetOrderResponseData::class => [
        'order' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    ListDevicesResponseData::class => [
        'devices' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    ListOrdersResponseData::class => [
        'orders' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListPackagesResponseData::class => [
        'packages' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    CheckNumberResponseData::class => [
        'from' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'lang' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'time' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'to' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    GetBalanceResponseData::class => [
        'balance' => [
            'kind' => 'scalar',
            'type' => 'float',
        ],
        'currency' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    GetPriceResponseData::class => [
        'info' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetTariffResponseData::class => [
        'info' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetTimezoneResponseData::class => [
        'datetime' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'timezone' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'unixtime' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ListCurrenciesResponseData::class => [
        'currencies' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListLanguagesResponseData::class => [
        'languages' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListTariffsResponseData::class => [
        'currency' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'package_tariffs' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'tariffs' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    LookupNumberResponseData::class => [
        'description' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'info' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'result' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'success' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
    ],
    RequestCallbackResponseData::class => [
        'from' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'time' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'to' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    CreateExtensionResponseData::class => [
        'numbers' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    EditExtensionResponseData::class => [
    ],
    GetExtensionInfoResponseData::class => [
        'caller_id' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'caller_id_app_change' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'caller_id_by_direction' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'ip_restriction' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'lines' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'pbx_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'record_email' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'record_store' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'supervisor_status' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    GetExtensionPasswordResponseData::class => [
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'password' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'pbx_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    GetExtensionStatusResponseData::class => [
        'is_online' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'pbx_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    ListExtensionsResponseData::class => [
        'numbers' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'pbx_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    UpdateExtensionPasswordResponseData::class => [
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'pbx_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    UpdateRecordingResponseData::class => [
        'email' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'internal_number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'recording' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'speech_recognition' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    CreateIvrResponseData::class => [
        'menu_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    CreateScenarioResponseData::class => [
        'menu_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'scenario_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    DeleteIvrResponseData::class => [
    ],
    DeleteScenarioResponseData::class => [
    ],
    DeleteSoundResponseData::class => [
    ],
    EditScenarioResponseData::class => [
        'items' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    GetScenarioResponseData::class => [
        'scenarios' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListIvrResponseData::class => [
        'ivrs' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'pbx_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    ListSoundsResponseData::class => [
    ],
    UploadSoundResponseData::class => [
    ],
    CreatePbxResponseData::class => [
        'stop_datetime' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    CreateRedirectionResponseData::class => [
        'condition' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'current_status' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'destination' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'pbx_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'pbx_name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    DeleteCallInfoUrlResponseData::class => [
        'url' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    DeleteRecordRequestResponseData::class => [
        'deleted_files' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'file_name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    DeleteWaitMelodyResponseData::class => [
    ],
    DeleteWebhooksUrlResponseData::class => [
        'url' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    GetCallInfoResponseData::class => [
        'notifications' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'url' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    GetRedirectionResponseData::class => [
        'condition' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'current_status' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'destination' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'pbx_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'pbx_name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'type' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    GetWebhooksResponseData::class => [
        'hooks' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'url' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    RequestRecordResponseData::class => [
        'lifetime_till' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'link' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'links' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    SetCallInfoNotificationsResponseData::class => [
        'notifications' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    SetCallInfoUrlResponseData::class => [
        'url' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    SetWebhookHooksResponseData::class => [
        'hooks' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    SetWebhooksUrlResponseData::class => [
        'url' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    SwitchWaitMelodyResponseData::class => [
    ],
    UploadWaitMelodyResponseData::class => [
    ],
    AddUserPhoneResponseData::class => [
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'is_proved' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    ConfirmPhoneResponseData::class => [
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    ConfirmUserRegistrationResponseData::class => [
        'user_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    CreateUserApiKeyResponseData::class => [
        'key' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'secret' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'user_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    FindUserResponseData::class => [
        'user' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetAccountInfoResponseData::class => [
        'balance' => [
            'kind' => 'scalar',
            'type' => 'float',
        ],
        'credit' => [
            'kind' => 'scalar',
            'type' => 'float',
        ],
        'currency' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'reseller_fee' => [
            'kind' => 'scalar',
            'type' => 'float',
        ],
        'user_fee' => [
            'kind' => 'scalar',
            'type' => 'float',
        ],
    ],
    GetUserApiKeyResponseData::class => [
        'allow_reset' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'key' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'last_request_datetime' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'secret' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'user_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    ListUserPhonesResponseData::class => [
        'list' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListUsersResponseData::class => [
        'page' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'total' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'total_pages' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'users' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ProvePhoneByCallbackResponseData::class => [
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    ProvePhoneBySmsResponseData::class => [
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    RegisterUserResponseData::class => [
        'user_id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    TopUpUserResponseData::class => [
        'reseller_withdraw' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'user_topup' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    TransferMoneyResponseData::class => [
        'reseller' => [
            'kind' => 'array',
            'type' => 'array',
        ],
        'user' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    UpdateUserPhoneResponseData::class => [
        'id' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'is_proved' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    CreateSipResponseData::class => [
        'sip' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    GracjanKubicki\LaravelZadarma\Saloon\Data\Sip\GetRedirectionResponseData::class => [
        'info' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    GetSipStatusResponseData::class => [
        'is_online' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'sip' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ListSipNumbersResponseData::class => [
        'left' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'sips' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    SwitchRedirectionResponseData::class => [
        'current_status' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'sip' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    UpdateCallerIdResponseData::class => [
        'new_caller_id' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'sip' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    UpdateRedirectionResponseData::class => [
        'destination' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'sip' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    UpdateSipPasswordResponseData::class => [
        'sip' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    ListSenderIdsResponseData::class => [
        'senders' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListTemplatesResponseData::class => [
        'list' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    SendSmsResponseData::class => [
        'cost' => [
            'kind' => 'scalar',
            'type' => 'float',
        ],
        'currency' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'denied_numbers' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'messages' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'sms_detalization' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    GetSpeechRecognitionResponseData::class => [
        'lang' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'otherLangs' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'phrases' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'recognitionStatus' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'words' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    UpdateSpeechRecognitionResponseData::class => [
    ],
    GetCallbackWidgetStatisticsResponseData::class => [
        'end' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'start' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'stats' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    GetIncomingCallsStatisticsResponseData::class => [
        'end' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'start' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'stats' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    GetPbxStatisticsResponseData::class => [
        'end' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'start' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'stats' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'version' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    GetStatisticsResponseData::class => [
        'end' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'start' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'stats' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    CheckVerificationResponseData::class => [
    ],
    CreateVerificationResponseData::class => [
        'request_id' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    CheckWrongsResponseData::class => [
        'info' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetAutoprolongationResponseData::class => [
        'autoprolongation' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    GetCountryResponseData::class => [
        'info' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    GetDirectNumberResponseData::class => [
        'info' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetIncomingChannelsResponseData::class => [
    ],
    ListAvailableNumbersResponseData::class => [
        'numbers' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListCountriesResponseData::class => [
        'info' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    ListDirectNumbersResponseData::class => [
        'info' => [
            'kind' => 'list',
            'type' => 'array',
        ],
    ],
    OrderNumberResponseData::class => [
        'is_activated' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'is_reserved' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    ProlongNumberResponseData::class => [
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'stop_date' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'total_paid' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    ReceiveSmsResponseData::class => [
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'receive_sms' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    SetCallerNameResponseData::class => [
        'caller_name' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    SetSipIdResponseData::class => [
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
        'sip_id' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    UpdateAutoprolongationResponseData::class => [
        'autoprolongation' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
        'number' => [
            'kind' => 'scalar',
            'type' => 'integer',
        ],
    ],
    UpdateIncomingChannelsResponseData::class => [
    ],
    AddDomainResponseData::class => [
    ],
    CreateIntegrationResponseData::class => [
    ],
    DeleteDomainResponseData::class => [
    ],
    DeleteIntegrationResponseData::class => [
    ],
    GetIntegrationResponseData::class => [
        'domains' => [
            'kind' => 'list',
            'type' => 'array',
        ],
        'is_exists' => [
            'kind' => 'scalar',
            'type' => 'boolean',
        ],
        'settings' => [
            'kind' => 'array',
            'type' => 'array',
        ],
    ],
    GetKeyResponseData::class => [
        'key' => [
            'kind' => 'scalar',
            'type' => 'string',
        ],
    ],
    UpdateIntegrationResponseData::class => [
    ],
];
