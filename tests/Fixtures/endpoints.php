<?php

declare(strict_types=1);

return [
    0 => [
        0 => 'Info',
        1 => 'GetBalanceRequest',
        2 => 'GetBalanceResponseData',
        3 => 'GET',
        4 => '/v1/info/balance/',
        5 => [
        ],
    ],
    1 => [
        0 => 'Info',
        1 => 'GetPriceRequest',
        2 => 'GetPriceResponseData',
        3 => 'GET',
        4 => '/v1/info/price/',
        5 => [
        ],
    ],
    2 => [
        0 => 'Info',
        1 => 'GetTimezoneRequest',
        2 => 'GetTimezoneResponseData',
        3 => 'GET',
        4 => '/v1/info/timezone/',
        5 => [
        ],
    ],
    3 => [
        0 => 'Info',
        1 => 'GetTariffRequest',
        2 => 'GetTariffResponseData',
        3 => 'GET',
        4 => '/v1/tariff/',
        5 => [
        ],
    ],
    4 => [
        0 => 'Info',
        1 => 'RequestCallbackRequest',
        2 => 'RequestCallbackResponseData',
        3 => 'GET',
        4 => '/v1/request/callback/',
        5 => [
        ],
    ],
    5 => [
        0 => 'Info',
        1 => 'CheckNumberRequest',
        2 => 'CheckNumberResponseData',
        3 => 'GET',
        4 => '/v1/request/checknumber/',
        5 => [
        ],
    ],
    6 => [
        0 => 'Info',
        1 => 'LookupNumberRequest',
        2 => 'LookupNumberResponseData',
        3 => 'POST',
        4 => '/v1/info/number_lookup/',
        5 => [
        ],
    ],
    7 => [
        0 => 'Info',
        1 => 'ListCurrenciesRequest',
        2 => 'ListCurrenciesResponseData',
        3 => 'GET',
        4 => '/v1/info/lists/currencies/',
        5 => [
        ],
    ],
    8 => [
        0 => 'Info',
        1 => 'ListLanguagesRequest',
        2 => 'ListLanguagesResponseData',
        3 => 'GET',
        4 => '/v1/info/lists/languages/',
        5 => [
        ],
    ],
    9 => [
        0 => 'Info',
        1 => 'ListTariffsRequest',
        2 => 'ListTariffsResponseData',
        3 => 'GET',
        4 => '/v1/info/lists/tariffs/',
        5 => [
        ],
    ],
    10 => [
        0 => 'Sip',
        1 => 'ListSipNumbersRequest',
        2 => 'ListSipNumbersResponseData',
        3 => 'GET',
        4 => '/v1/sip/',
        5 => [
        ],
    ],
    11 => [
        0 => 'Sip',
        1 => 'GetSipStatusRequest',
        2 => 'GetSipStatusResponseData',
        3 => 'GET',
        4 => '/v1/sip/<SIP>/status/',
        5 => [
            0 => 'SIP',
        ],
    ],
    12 => [
        0 => 'Sip',
        1 => 'UpdateCallerIdRequest',
        2 => 'UpdateCallerIdResponseData',
        3 => 'PUT',
        4 => '/v1/sip/callerid/',
        5 => [
        ],
    ],
    13 => [
        0 => 'Sip',
        1 => 'GetRedirectionRequest',
        2 => 'GetRedirectionResponseData',
        3 => 'GET',
        4 => '/v1/sip/redirection/',
        5 => [
        ],
    ],
    14 => [
        0 => 'Sip',
        1 => 'SwitchRedirectionRequest',
        2 => 'SwitchRedirectionResponseData',
        3 => 'PUT',
        4 => '/v1/sip/redirection/',
        5 => [
        ],
    ],
    15 => [
        0 => 'Sip',
        1 => 'UpdateRedirectionRequest',
        2 => 'UpdateRedirectionResponseData',
        3 => 'PUT',
        4 => '/v1/sip/redirection/',
        5 => [
        ],
    ],
    16 => [
        0 => 'Sip',
        1 => 'CreateSipRequest',
        2 => 'CreateSipResponseData',
        3 => 'POST',
        4 => '/v1/sip/create/',
        5 => [
        ],
    ],
    17 => [
        0 => 'Sip',
        1 => 'UpdateSipPasswordRequest',
        2 => 'UpdateSipPasswordResponseData',
        3 => 'PUT',
        4 => '/v1/sip/<SIP>/password/',
        5 => [
            0 => 'SIP',
        ],
    ],
    18 => [
        0 => 'Statistics',
        1 => 'GetStatisticsRequest',
        2 => 'GetStatisticsResponseData',
        3 => 'GET',
        4 => '/v1/statistics/',
        5 => [
        ],
    ],
    19 => [
        0 => 'Statistics',
        1 => 'GetPbxStatisticsRequest',
        2 => 'GetPbxStatisticsResponseData',
        3 => 'GET',
        4 => '/v1/statistics/pbx/',
        5 => [
        ],
    ],
    20 => [
        0 => 'Statistics',
        1 => 'GetCallbackWidgetStatisticsRequest',
        2 => 'GetCallbackWidgetStatisticsResponseData',
        3 => 'GET',
        4 => '/v1/statistics/callback_widget/',
        5 => [
        ],
    ],
    21 => [
        0 => 'Statistics',
        1 => 'GetIncomingCallsStatisticsRequest',
        2 => 'GetIncomingCallsStatisticsResponseData',
        3 => 'GET',
        4 => '/v1/statistics/incoming-calls/',
        5 => [
        ],
    ],
    22 => [
        0 => 'Pbx',
        1 => 'CreateRedirectionRequest',
        2 => 'CreateRedirectionResponseData',
        3 => 'POST',
        4 => '/v1/pbx/redirection/',
        5 => [
        ],
    ],
    23 => [
        0 => 'Pbx',
        1 => 'GetRedirectionRequest',
        2 => 'GetRedirectionResponseData',
        3 => 'GET',
        4 => '/v1/pbx/redirection/',
        5 => [
        ],
    ],
    24 => [
        0 => 'Pbx',
        1 => 'RequestRecordRequest',
        2 => 'RequestRecordResponseData',
        3 => 'GET',
        4 => '/v1/pbx/record/request/',
        5 => [
        ],
    ],
    25 => [
        0 => 'Pbx',
        1 => 'DeleteRecordRequestRequest',
        2 => 'DeleteRecordRequestResponseData',
        3 => 'DELETE',
        4 => '/v1/pbx/record/request/',
        5 => [
        ],
    ],
    26 => [
        0 => 'Pbx',
        1 => 'UploadWaitMelodyRequest',
        2 => 'UploadWaitMelodyResponseData',
        3 => 'POST',
        4 => '/v1/pbx/waitmelody/upload',
        5 => [
        ],
    ],
    27 => [
        0 => 'Pbx',
        1 => 'SwitchWaitMelodyRequest',
        2 => 'SwitchWaitMelodyResponseData',
        3 => 'PUT',
        4 => '/v1/pbx/waitmelody/switch',
        5 => [
        ],
    ],
    28 => [
        0 => 'Pbx',
        1 => 'DeleteWaitMelodyRequest',
        2 => 'DeleteWaitMelodyResponseData',
        3 => 'DELETE',
        4 => '/v1/pbx/waitmelody/delete',
        5 => [
        ],
    ],
    29 => [
        0 => 'Pbx',
        1 => 'GetCallInfoRequest',
        2 => 'GetCallInfoResponseData',
        3 => 'GET',
        4 => '/v1/pbx/callinfo/',
        5 => [
        ],
    ],
    30 => [
        0 => 'Pbx',
        1 => 'SetCallInfoUrlRequest',
        2 => 'SetCallInfoUrlResponseData',
        3 => 'POST',
        4 => '/v1/pbx/callinfo/url/',
        5 => [
        ],
    ],
    31 => [
        0 => 'Pbx',
        1 => 'SetCallInfoNotificationsRequest',
        2 => 'SetCallInfoNotificationsResponseData',
        3 => 'POST',
        4 => '/v1/pbx/callinfo/notifications/',
        5 => [
        ],
    ],
    32 => [
        0 => 'Pbx',
        1 => 'DeleteCallInfoUrlRequest',
        2 => 'DeleteCallInfoUrlResponseData',
        3 => 'DELETE',
        4 => '/v1/pbx/callinfo/url/',
        5 => [
        ],
    ],
    33 => [
        0 => 'Pbx',
        1 => 'CreatePbxRequest',
        2 => 'CreatePbxResponseData',
        3 => 'POST',
        4 => '/v1/pbx/create/',
        5 => [
        ],
    ],
    34 => [
        0 => 'Pbx',
        1 => 'GetWebhooksRequest',
        2 => 'GetWebhooksResponseData',
        3 => 'GET',
        4 => '/v1/pbx/webhooks/',
        5 => [
        ],
    ],
    35 => [
        0 => 'Pbx',
        1 => 'SetWebhooksUrlRequest',
        2 => 'SetWebhooksUrlResponseData',
        3 => 'POST',
        4 => '/v1/pbx/webhooks/url/',
        5 => [
        ],
    ],
    36 => [
        0 => 'Pbx',
        1 => 'SetWebhookHooksRequest',
        2 => 'SetWebhookHooksResponseData',
        3 => 'POST',
        4 => '/v1/pbx/webhooks/hooks/',
        5 => [
        ],
    ],
    37 => [
        0 => 'Pbx',
        1 => 'DeleteWebhooksUrlRequest',
        2 => 'DeleteWebhooksUrlResponseData',
        3 => 'DELETE',
        4 => '/v1/pbx/webhooks/url/',
        5 => [
        ],
    ],
    38 => [
        0 => 'PbxExtensions',
        1 => 'ListExtensionsRequest',
        2 => 'ListExtensionsResponseData',
        3 => 'GET',
        4 => '/v1/pbx/internal/',
        5 => [
        ],
    ],
    39 => [
        0 => 'PbxExtensions',
        1 => 'GetExtensionStatusRequest',
        2 => 'GetExtensionStatusResponseData',
        3 => 'GET',
        4 => '/v1/pbx/internal/<PBXSIP>/status/',
        5 => [
            0 => 'PBXSIP',
        ],
    ],
    40 => [
        0 => 'PbxExtensions',
        1 => 'GetExtensionInfoRequest',
        2 => 'GetExtensionInfoResponseData',
        3 => 'GET',
        4 => '/v1/pbx/internal/<PBXSIP>/info/',
        5 => [
            0 => 'PBXSIP',
        ],
    ],
    41 => [
        0 => 'PbxExtensions',
        1 => 'UpdateRecordingRequest',
        2 => 'UpdateRecordingResponseData',
        3 => 'PUT',
        4 => '/v1/pbx/internal/recording/',
        5 => [
        ],
    ],
    42 => [
        0 => 'PbxExtensions',
        1 => 'CreateExtensionRequest',
        2 => 'CreateExtensionResponseData',
        3 => 'POST',
        4 => '/v1/pbx/internal/create/',
        5 => [
        ],
    ],
    43 => [
        0 => 'PbxExtensions',
        1 => 'GetExtensionPasswordRequest',
        2 => 'GetExtensionPasswordResponseData',
        3 => 'GET',
        4 => '/v1/pbx/internal/<SIP>/password/',
        5 => [
            0 => 'SIP',
        ],
    ],
    44 => [
        0 => 'PbxExtensions',
        1 => 'UpdateExtensionPasswordRequest',
        2 => 'UpdateExtensionPasswordResponseData',
        3 => 'PUT',
        4 => '/v1/pbx/internal/<SIP>/password/',
        5 => [
            0 => 'SIP',
        ],
    ],
    45 => [
        0 => 'PbxExtensions',
        1 => 'EditExtensionRequest',
        2 => 'EditExtensionResponseData',
        3 => 'PUT',
        4 => '/v1/pbx/internal/<SIP>/edit/',
        5 => [
            0 => 'SIP',
        ],
    ],
    46 => [
        0 => 'PbxIvr',
        1 => 'ListSoundsRequest',
        2 => 'ListSoundsResponseData',
        3 => 'GET',
        4 => '/v1/pbx/ivr/sounds/list',
        5 => [
        ],
    ],
    47 => [
        0 => 'PbxIvr',
        1 => 'UploadSoundRequest',
        2 => 'UploadSoundResponseData',
        3 => 'POST',
        4 => '/v1/pbx/ivr/sounds/upload',
        5 => [
        ],
    ],
    48 => [
        0 => 'PbxIvr',
        1 => 'DeleteSoundRequest',
        2 => 'DeleteSoundResponseData',
        3 => 'DELETE',
        4 => '/v1/pbx/ivr/sounds/delete',
        5 => [
        ],
    ],
    49 => [
        0 => 'PbxIvr',
        1 => 'ListIvrRequest',
        2 => 'ListIvrResponseData',
        3 => 'GET',
        4 => '/v1/pbx/ivr/',
        5 => [
        ],
    ],
    50 => [
        0 => 'PbxIvr',
        1 => 'CreateIvrRequest',
        2 => 'CreateIvrResponseData',
        3 => 'POST',
        4 => '/v1/pbx/ivr/create/',
        5 => [
        ],
    ],
    51 => [
        0 => 'PbxIvr',
        1 => 'DeleteIvrRequest',
        2 => 'DeleteIvrResponseData',
        3 => 'DELETE',
        4 => '/v1/pbx/ivr/delete/',
        5 => [
        ],
    ],
    52 => [
        0 => 'PbxIvr',
        1 => 'GetScenarioRequest',
        2 => 'GetScenarioResponseData',
        3 => 'GET',
        4 => '/v1/pbx/ivr/scenario/',
        5 => [
        ],
    ],
    53 => [
        0 => 'PbxIvr',
        1 => 'CreateScenarioRequest',
        2 => 'CreateScenarioResponseData',
        3 => 'POST',
        4 => '/v1/pbx/ivr/scenario/create/',
        5 => [
        ],
    ],
    54 => [
        0 => 'PbxIvr',
        1 => 'EditScenarioRequest',
        2 => 'EditScenarioResponseData',
        3 => 'PUT',
        4 => '/v1/pbx/ivr/scenario/edit/',
        5 => [
        ],
    ],
    55 => [
        0 => 'PbxIvr',
        1 => 'DeleteScenarioRequest',
        2 => 'DeleteScenarioResponseData',
        3 => 'DELETE',
        4 => '/v1/pbx/ivr/scenario/delete/',
        5 => [
        ],
    ],
    56 => [
        0 => 'SpeechRecognition',
        1 => 'GetSpeechRecognitionRequest',
        2 => 'GetSpeechRecognitionResponseData',
        3 => 'GET',
        4 => '/v1/speech_recognition/',
        5 => [
        ],
    ],
    57 => [
        0 => 'SpeechRecognition',
        1 => 'UpdateSpeechRecognitionRequest',
        2 => 'UpdateSpeechRecognitionResponseData',
        3 => 'PUT',
        4 => '/v1/speech_recognition/',
        5 => [
        ],
    ],
    58 => [
        0 => 'VirtualNumbers',
        1 => 'ListDirectNumbersRequest',
        2 => 'ListDirectNumbersResponseData',
        3 => 'GET',
        4 => '/v1/direct_numbers/',
        5 => [
        ],
    ],
    59 => [
        0 => 'VirtualNumbers',
        1 => 'GetDirectNumberRequest',
        2 => 'GetDirectNumberResponseData',
        3 => 'GET',
        4 => '/v1/direct_numbers/number/',
        5 => [
        ],
    ],
    60 => [
        0 => 'VirtualNumbers',
        1 => 'GetAutoprolongationRequest',
        2 => 'GetAutoprolongationResponseData',
        3 => 'GET',
        4 => '/v1/direct_numbers/autoprolongation/',
        5 => [
        ],
    ],
    61 => [
        0 => 'VirtualNumbers',
        1 => 'CheckWrongsRequest',
        2 => 'CheckWrongsResponseData',
        3 => 'GET',
        4 => '/v1/direct_numbers/checking-wrongs/',
        5 => [
        ],
    ],
    62 => [
        0 => 'VirtualNumbers',
        1 => 'UpdateAutoprolongationRequest',
        2 => 'UpdateAutoprolongationResponseData',
        3 => 'PUT',
        4 => '/v1/direct_numbers/autoprolongation/',
        5 => [
        ],
    ],
    63 => [
        0 => 'VirtualNumbers',
        1 => 'ListCountriesRequest',
        2 => 'ListCountriesResponseData',
        3 => 'GET',
        4 => '/v1/direct_numbers/countries/',
        5 => [
        ],
    ],
    64 => [
        0 => 'VirtualNumbers',
        1 => 'GetCountryRequest',
        2 => 'GetCountryResponseData',
        3 => 'GET',
        4 => '/v1/direct_numbers/country/',
        5 => [
        ],
    ],
    65 => [
        0 => 'VirtualNumbers',
        1 => 'SetCallerNameRequest',
        2 => 'SetCallerNameResponseData',
        3 => 'PUT',
        4 => '/v1/direct_numbers/set_caller_name/',
        5 => [
        ],
    ],
    66 => [
        0 => 'VirtualNumbers',
        1 => 'SetSipIdRequest',
        2 => 'SetSipIdResponseData',
        3 => 'PUT',
        4 => '/v1/direct_numbers/set_sip_id/',
        5 => [
        ],
    ],
    67 => [
        0 => 'VirtualNumbers',
        1 => 'ListAvailableNumbersRequest',
        2 => 'ListAvailableNumbersResponseData',
        3 => 'GET',
        4 => '/v1/direct_numbers/available/<DIRECTION_ID>/',
        5 => [
            0 => 'DIRECTION_ID',
        ],
    ],
    68 => [
        0 => 'VirtualNumbers',
        1 => 'OrderNumberRequest',
        2 => 'OrderNumberResponseData',
        3 => 'POST',
        4 => '/v1/direct_numbers/order/',
        5 => [
        ],
    ],
    69 => [
        0 => 'VirtualNumbers',
        1 => 'ProlongNumberRequest',
        2 => 'ProlongNumberResponseData',
        3 => 'POST',
        4 => '/v1/direct_numbers/prolong/',
        5 => [
        ],
    ],
    70 => [
        0 => 'VirtualNumbers',
        1 => 'ReceiveSmsRequest',
        2 => 'ReceiveSmsResponseData',
        3 => 'PUT',
        4 => '/v1/direct_numbers/receive_sms/',
        5 => [
        ],
    ],
    71 => [
        0 => 'VirtualNumbers',
        1 => 'GetIncomingChannelsRequest',
        2 => 'GetIncomingChannelsResponseData',
        3 => 'GET',
        4 => '/v1/direct_numbers/incoming_channels/',
        5 => [
        ],
    ],
    72 => [
        0 => 'VirtualNumbers',
        1 => 'UpdateIncomingChannelsRequest',
        2 => 'UpdateIncomingChannelsResponseData',
        3 => 'PUT',
        4 => '/v1/direct_numbers/incoming_channels/',
        5 => [
        ],
    ],
    73 => [
        0 => 'Documents',
        1 => 'ListFilesRequest',
        2 => 'ListFilesResponseData',
        3 => 'GET',
        4 => '/v1/documents/files',
        5 => [
        ],
    ],
    74 => [
        0 => 'Documents',
        1 => 'ListGroupsRequest',
        2 => 'ListGroupsResponseData',
        3 => 'GET',
        4 => '/v1/documents/groups/list/',
        5 => [
        ],
    ],
    75 => [
        0 => 'Documents',
        1 => 'GetGroupRequest',
        2 => 'GetGroupResponseData',
        3 => 'GET',
        4 => '/v1/documents/groups/get/<ID>/',
        5 => [
            0 => 'ID',
        ],
    ],
    76 => [
        0 => 'Documents',
        1 => 'ValidateGroupRequest',
        2 => 'ValidateGroupResponseData',
        3 => 'GET',
        4 => '/v1/documents/groups/valid/<ID>/',
        5 => [
            0 => 'ID',
        ],
    ],
    77 => [
        0 => 'Documents',
        1 => 'CreateGroupRequest',
        2 => 'CreateGroupResponseData',
        3 => 'POST',
        4 => '/v1/documents/groups/create/',
        5 => [
        ],
    ],
    78 => [
        0 => 'Documents',
        1 => 'UpdateGroupRequest',
        2 => 'UpdateGroupResponseData',
        3 => 'PUT',
        4 => '/v1/documents/groups/update/<GROUPID>/',
        5 => [
            0 => 'GROUPID',
        ],
    ],
    79 => [
        0 => 'Documents',
        1 => 'UploadDocumentRequest',
        2 => 'UploadDocumentResponseData',
        3 => 'POST',
        4 => '/v1/documents/upload/',
        5 => [
        ],
    ],
    80 => [
        0 => 'Reseller',
        1 => 'GetAccountInfoRequest',
        2 => 'GetAccountInfoResponseData',
        3 => 'GET',
        4 => '/v1/reseller/account/info/',
        5 => [
        ],
    ],
    81 => [
        0 => 'Reseller',
        1 => 'TransferMoneyRequest',
        2 => 'TransferMoneyResponseData',
        3 => 'POST',
        4 => '/v1/reseller/account/money_transfer/',
        5 => [
        ],
    ],
    82 => [
        0 => 'Reseller',
        1 => 'ListUserPhonesRequest',
        2 => 'ListUserPhonesResponseData',
        3 => 'GET',
        4 => '/v1/reseller/users/phones/',
        5 => [
        ],
    ],
    83 => [
        0 => 'Reseller',
        1 => 'AddUserPhoneRequest',
        2 => 'AddUserPhoneResponseData',
        3 => 'POST',
        4 => '/v1/reseller/users/phones/add/',
        5 => [
        ],
    ],
    84 => [
        0 => 'Reseller',
        1 => 'UpdateUserPhoneRequest',
        2 => 'UpdateUserPhoneResponseData',
        3 => 'POST',
        4 => '/v1/reseller/users/phones/update/',
        5 => [
        ],
    ],
    85 => [
        0 => 'Reseller',
        1 => 'ProvePhoneBySmsRequest',
        2 => 'ProvePhoneBySmsResponseData',
        3 => 'POST',
        4 => '/v1/reseller/users/phones/prove_by_sms',
        5 => [
        ],
    ],
    86 => [
        0 => 'Reseller',
        1 => 'ProvePhoneByCallbackRequest',
        2 => 'ProvePhoneByCallbackResponseData',
        3 => 'POST',
        4 => '/v1/reseller/users/phones/prove_by_callback',
        5 => [
        ],
    ],
    87 => [
        0 => 'Reseller',
        1 => 'ConfirmPhoneRequest',
        2 => 'ConfirmPhoneResponseData',
        3 => 'POST',
        4 => '/v1/reseller/users/phones/confirm',
        5 => [
        ],
    ],
    88 => [
        0 => 'Reseller',
        1 => 'RegisterUserRequest',
        2 => 'RegisterUserResponseData',
        3 => 'POST',
        4 => '/v1/reseller/users/registration/new/',
        5 => [
        ],
    ],
    89 => [
        0 => 'Reseller',
        1 => 'ConfirmUserRegistrationRequest',
        2 => 'ConfirmUserRegistrationResponseData',
        3 => 'POST',
        4 => '/v1/reseller/users/registration/confirm/',
        5 => [
        ],
    ],
    90 => [
        0 => 'Reseller',
        1 => 'ListUsersRequest',
        2 => 'ListUsersResponseData',
        3 => 'GET',
        4 => '/v1/reseller/users/list/',
        5 => [
        ],
    ],
    91 => [
        0 => 'Reseller',
        1 => 'FindUserRequest',
        2 => 'FindUserResponseData',
        3 => 'GET',
        4 => '/v1/reseller/users/find/',
        5 => [
        ],
    ],
    92 => [
        0 => 'Reseller',
        1 => 'TopUpUserRequest',
        2 => 'TopUpUserResponseData',
        3 => 'POST',
        4 => '/v1/reseller/users/topup/',
        5 => [
        ],
    ],
    93 => [
        0 => 'Reseller',
        1 => 'GetUserApiKeyRequest',
        2 => 'GetUserApiKeyResponseData',
        3 => 'GET',
        4 => '/v1/reseller/users/api_key/',
        5 => [
        ],
    ],
    94 => [
        0 => 'Reseller',
        1 => 'CreateUserApiKeyRequest',
        2 => 'CreateUserApiKeyResponseData',
        3 => 'POST',
        4 => '/v1/reseller/users/api_key/',
        5 => [
        ],
    ],
    95 => [
        0 => 'Sms',
        1 => 'SendSmsRequest',
        2 => 'SendSmsResponseData',
        3 => 'POST',
        4 => '/v1/sms/send/',
        5 => [
        ],
    ],
    96 => [
        0 => 'Sms',
        1 => 'ListTemplatesRequest',
        2 => 'ListTemplatesResponseData',
        3 => 'GET',
        4 => '/v1/sms/templates/',
        5 => [
        ],
    ],
    97 => [
        0 => 'Sms',
        1 => 'ListSenderIdsRequest',
        2 => 'ListSenderIdsResponseData',
        3 => 'GET',
        4 => '/v1/sms/senderid/',
        5 => [
        ],
    ],
    98 => [
        0 => 'WebRtc',
        1 => 'GetKeyRequest',
        2 => 'GetKeyResponseData',
        3 => 'GET',
        4 => '/v1/webrtc/get_key/',
        5 => [
        ],
    ],
    99 => [
        0 => 'WebRtc',
        1 => 'CreateIntegrationRequest',
        2 => 'CreateIntegrationResponseData',
        3 => 'POST',
        4 => '/v1/webrtc/create/',
        5 => [
        ],
    ],
    100 => [
        0 => 'WebRtc',
        1 => 'UpdateIntegrationRequest',
        2 => 'UpdateIntegrationResponseData',
        3 => 'PUT',
        4 => '/v1/webrtc/',
        5 => [
        ],
    ],
    101 => [
        0 => 'WebRtc',
        1 => 'GetIntegrationRequest',
        2 => 'GetIntegrationResponseData',
        3 => 'GET',
        4 => '/v1/webrtc/',
        5 => [
        ],
    ],
    102 => [
        0 => 'WebRtc',
        1 => 'AddDomainRequest',
        2 => 'AddDomainResponseData',
        3 => 'POST',
        4 => '/v1/webrtc/domain/',
        5 => [
        ],
    ],
    103 => [
        0 => 'WebRtc',
        1 => 'DeleteDomainRequest',
        2 => 'DeleteDomainResponseData',
        3 => 'DELETE',
        4 => '/v1/webrtc/domain/',
        5 => [
        ],
    ],
    104 => [
        0 => 'WebRtc',
        1 => 'DeleteIntegrationRequest',
        2 => 'DeleteIntegrationResponseData',
        3 => 'DELETE',
        4 => '/v1/webrtc/',
        5 => [
        ],
    ],
    105 => [
        0 => 'Esim',
        1 => 'ListDevicesRequest',
        2 => 'ListDevicesResponseData',
        3 => 'GET',
        4 => '/v1/esim/devices/',
        5 => [
        ],
    ],
    106 => [
        0 => 'Esim',
        1 => 'ListPackagesRequest',
        2 => 'ListPackagesResponseData',
        3 => 'GET',
        4 => '/v1/esim/packages/',
        5 => [
        ],
    ],
    107 => [
        0 => 'Esim',
        1 => 'ListOrdersRequest',
        2 => 'ListOrdersResponseData',
        3 => 'GET',
        4 => '/v1/esim/order/',
        5 => [
        ],
    ],
    108 => [
        0 => 'Esim',
        1 => 'GetOrderRequest',
        2 => 'GetOrderResponseData',
        3 => 'GET',
        4 => '/v1/esim/order/<iccid>/',
        5 => [
            0 => 'iccid',
        ],
    ],
    109 => [
        0 => 'Esim',
        1 => 'CreateOrderRequest',
        2 => 'CreateOrderResponseData',
        3 => 'POST',
        4 => '/v1/esim/order/create/',
        5 => [
        ],
    ],
    110 => [
        0 => 'Verify',
        1 => 'CreateVerificationRequest',
        2 => 'CreateVerificationResponseData',
        3 => 'POST',
        4 => '/v1/verify/',
        5 => [
        ],
    ],
    111 => [
        0 => 'Verify',
        1 => 'CheckVerificationRequest',
        2 => 'CheckVerificationResponseData',
        3 => 'POST',
        4 => '/v1/verify/check/',
        5 => [
        ],
    ],
    112 => [
        0 => 'Crm\\Clients',
        1 => 'ListCustomersRequest',
        2 => 'ListCustomersResponseData',
        3 => 'GET',
        4 => '/customers',
        5 => [
        ],
    ],
    113 => [
        0 => 'Crm\\Clients',
        1 => 'GetCustomerRequest',
        2 => 'GetCustomerResponseData',
        3 => 'GET',
        4 => '/customers/<c_id>',
        5 => [
            0 => 'c_id',
        ],
    ],
    114 => [
        0 => 'Crm\\Clients',
        1 => 'CreateCustomerRequest',
        2 => 'CreateCustomerResponseData',
        3 => 'POST',
        4 => '/customers',
        5 => [
        ],
    ],
    115 => [
        0 => 'Crm\\Clients',
        1 => 'UpdateCustomerRequest',
        2 => 'UpdateCustomerResponseData',
        3 => 'PUT',
        4 => '/customers/<c_id>',
        5 => [
            0 => 'c_id',
        ],
    ],
    116 => [
        0 => 'Crm\\Clients',
        1 => 'DeleteCustomerRequest',
        2 => 'DeleteCustomerResponseData',
        3 => 'DELETE',
        4 => '/customers/<c_id>',
        5 => [
            0 => 'c_id',
        ],
    ],
    117 => [
        0 => 'Crm\\SourceTags',
        1 => 'ListCustomerUtmsRequest',
        2 => 'ListCustomerUtmsResponseData',
        3 => 'GET',
        4 => '/customers/utms',
        5 => [
        ],
    ],
    118 => [
        0 => 'Crm\\SourceTags',
        1 => 'CreateCustomerUtmRequest',
        2 => 'CreateCustomerUtmResponseData',
        3 => 'POST',
        4 => '/customers/utms',
        5 => [
        ],
    ],
    119 => [
        0 => 'Crm\\SourceTags',
        1 => 'UpdateCustomerUtmRequest',
        2 => 'UpdateCustomerUtmResponseData',
        3 => 'PUT',
        4 => '/customers/utms/<utm_id>',
        5 => [
            0 => 'utm_id',
        ],
    ],
    120 => [
        0 => 'Crm\\SourceTags',
        1 => 'DeleteCustomerUtmRequest',
        2 => 'DeleteCustomerUtmResponseData',
        3 => 'DELETE',
        4 => '/customers/utms/<utm_id>',
        5 => [
            0 => 'utm_id',
        ],
    ],
    121 => [
        0 => 'Crm\\Labels',
        1 => 'ListCustomerLabelsRequest',
        2 => 'ListCustomerLabelsResponseData',
        3 => 'GET',
        4 => '/customers/labels',
        5 => [
        ],
    ],
    122 => [
        0 => 'Crm\\Labels',
        1 => 'CreateCustomerLabelRequest',
        2 => 'CreateCustomerLabelResponseData',
        3 => 'POST',
        4 => '/customers/labels',
        5 => [
        ],
    ],
    123 => [
        0 => 'Crm\\Labels',
        1 => 'DeleteCustomerLabelRequest',
        2 => 'DeleteCustomerLabelResponseData',
        3 => 'DELETE',
        4 => '/customers/labels/<l_id>',
        5 => [
            0 => 'l_id',
        ],
    ],
    124 => [
        0 => 'Crm\\AdditionalFeatures',
        1 => 'ListCustomerCustomPropertiesRequest',
        2 => 'ListCustomerCustomPropertiesResponseData',
        3 => 'GET',
        4 => '/customers/custom-properties',
        5 => [
        ],
    ],
    125 => [
        0 => 'Crm\\ClientTimeline',
        1 => 'ListCustomerFeedRequest',
        2 => 'ListCustomerFeedResponseData',
        3 => 'GET',
        4 => '/customers/<c_id>/feed',
        5 => [
            0 => 'c_id',
        ],
    ],
    126 => [
        0 => 'Crm\\ClientTimeline',
        1 => 'CreateCustomerFeedItemRequest',
        2 => 'CreateCustomerFeedItemResponseData',
        3 => 'POST',
        4 => '/customers/<c_id>/feed',
        5 => [
            0 => 'c_id',
        ],
    ],
    127 => [
        0 => 'Crm\\ClientTimeline',
        1 => 'UpdateCustomerFeedItemRequest',
        2 => 'UpdateCustomerFeedItemResponseData',
        3 => 'PUT',
        4 => '/customers/<c_id>/feed/<i_id>',
        5 => [
            0 => 'c_id',
            1 => 'i_id',
        ],
    ],
    128 => [
        0 => 'Crm\\ClientTimeline',
        1 => 'DeleteCustomerFeedItemRequest',
        2 => 'DeleteCustomerFeedItemResponseData',
        3 => 'DELETE',
        4 => '/customers/<c_id>/feed/<i_id>',
        5 => [
            0 => 'c_id',
            1 => 'i_id',
        ],
    ],
    129 => [
        0 => 'Crm\\Employees',
        1 => 'ListCustomerEmployeesRequest',
        2 => 'ListCustomerEmployeesResponseData',
        3 => 'GET',
        4 => '/customers/<c_id>/employees',
        5 => [
            0 => 'c_id',
        ],
    ],
    130 => [
        0 => 'Crm\\Employees',
        1 => 'GetCustomerEmployeeRequest',
        2 => 'GetCustomerEmployeeResponseData',
        3 => 'GET',
        4 => '/customers/<c_id>/employees/<e_id>',
        5 => [
            0 => 'c_id',
            1 => 'e_id',
        ],
    ],
    131 => [
        0 => 'Crm\\Employees',
        1 => 'CreateCustomerEmployeeRequest',
        2 => 'CreateCustomerEmployeeResponseData',
        3 => 'POST',
        4 => '/customers/<c_id>/employees',
        5 => [
            0 => 'c_id',
        ],
    ],
    132 => [
        0 => 'Crm\\Employees',
        1 => 'UpdateCustomerEmployeeRequest',
        2 => 'UpdateCustomerEmployeeResponseData',
        3 => 'PUT',
        4 => '/customers/<c_id>/employees/<e_id>',
        5 => [
            0 => 'c_id',
            1 => 'e_id',
        ],
    ],
    133 => [
        0 => 'Crm\\Employees',
        1 => 'DeleteCustomerEmployeeRequest',
        2 => 'DeleteCustomerEmployeeResponseData',
        3 => 'DELETE',
        4 => '/customers/<c_id>/employees/<e_id>',
        5 => [
            0 => 'c_id',
            1 => 'e_id',
        ],
    ],
    134 => [
        0 => 'Crm\\Leads',
        1 => 'ListLeadsRequest',
        2 => 'ListLeadsResponseData',
        3 => 'GET',
        4 => '/leads',
        5 => [
        ],
    ],
    135 => [
        0 => 'Crm\\Leads',
        1 => 'GetLeadRequest',
        2 => 'GetLeadResponseData',
        3 => 'GET',
        4 => '/leads/<lead_id>',
        5 => [
            0 => 'lead_id',
        ],
    ],
    136 => [
        0 => 'Crm\\Leads',
        1 => 'CreateLeadRequest',
        2 => 'CreateLeadResponseData',
        3 => 'POST',
        4 => '/leads',
        5 => [
        ],
    ],
    137 => [
        0 => 'Crm\\Leads',
        1 => 'UpdateLeadRequest',
        2 => 'UpdateLeadResponseData',
        3 => 'PUT',
        4 => '/leads/<lead_id>',
        5 => [
            0 => 'lead_id',
        ],
    ],
    138 => [
        0 => 'Crm\\Leads',
        1 => 'DeleteLeadRequest',
        2 => 'DeleteLeadResponseData',
        3 => 'DELETE',
        4 => '/leads/<lead_id>',
        5 => [
            0 => 'lead_id',
        ],
    ],
    139 => [
        0 => 'Crm\\Users',
        1 => 'ListUsersRequest',
        2 => 'ListUsersResponseData',
        3 => 'GET',
        4 => '/users',
        5 => [
        ],
    ],
    140 => [
        0 => 'Crm\\Users',
        1 => 'GetUserRequest',
        2 => 'GetUserResponseData',
        3 => 'GET',
        4 => '/users/<user_id>',
        5 => [
            0 => 'user_id',
        ],
    ],
    141 => [
        0 => 'Crm\\Users',
        1 => 'GetUserWorkingHoursRequest',
        2 => 'GetUserWorkingHoursResponseData',
        3 => 'GET',
        4 => '/users/<user_id>/working-hours',
        5 => [
            0 => 'user_id',
        ],
    ],
    142 => [
        0 => 'Crm\\Users',
        1 => 'ListUserGroupsRequest',
        2 => 'ListUserGroupsResponseData',
        3 => 'GET',
        4 => '/users/groups',
        5 => [
        ],
    ],
    143 => [
        0 => 'Crm\\GeneralizedContacts',
        1 => 'ListContactsRequest',
        2 => 'ListContactsResponseData',
        3 => 'GET',
        4 => '/contacts',
        5 => [
        ],
    ],
    144 => [
        0 => 'Crm\\GeneralizedContacts',
        1 => 'IdentifyContactRequest',
        2 => 'IdentifyContactResponseData',
        3 => 'GET',
        4 => '/contacts/identify',
        5 => [
        ],
    ],
    145 => [
        0 => 'Crm\\Deals',
        1 => 'ListDealsRequest',
        2 => 'ListDealsResponseData',
        3 => 'GET',
        4 => '/deals',
        5 => [
        ],
    ],
    146 => [
        0 => 'Crm\\Deals',
        1 => 'GetDealRequest',
        2 => 'GetDealResponseData',
        3 => 'GET',
        4 => '/deals/<deal_id>',
        5 => [
            0 => 'deal_id',
        ],
    ],
    147 => [
        0 => 'Crm\\Deals',
        1 => 'CreateDealRequest',
        2 => 'CreateDealResponseData',
        3 => 'POST',
        4 => '/deals',
        5 => [
        ],
    ],
    148 => [
        0 => 'Crm\\Deals',
        1 => 'UpdateDealRequest',
        2 => 'UpdateDealResponseData',
        3 => 'PUT',
        4 => '/deals/<deal_id>',
        5 => [
            0 => 'deal_id',
        ],
    ],
    149 => [
        0 => 'Crm\\Deals',
        1 => 'DeleteDealRequest',
        2 => 'DeleteDealResponseData',
        3 => 'DELETE',
        4 => '/deals/<deal_id>',
        5 => [
            0 => 'deal_id',
        ],
    ],
    150 => [
        0 => 'Crm\\DealFeed',
        1 => 'ListDealFeedRequest',
        2 => 'ListDealFeedResponseData',
        3 => 'GET',
        4 => '/deals/<deal_id>/feed',
        5 => [
            0 => 'deal_id',
        ],
    ],
    151 => [
        0 => 'Crm\\DealFeed',
        1 => 'CreateDealFeedItemRequest',
        2 => 'CreateDealFeedItemResponseData',
        3 => 'POST',
        4 => '/deals/<deal_id>/feed',
        5 => [
            0 => 'deal_id',
        ],
    ],
    152 => [
        0 => 'Crm\\DealFeed',
        1 => 'UpdateDealFeedItemRequest',
        2 => 'UpdateDealFeedItemResponseData',
        3 => 'PUT',
        4 => '/deals/<deal_id>/feed/<i_id>',
        5 => [
            0 => 'deal_id',
            1 => 'i_id',
        ],
    ],
    153 => [
        0 => 'Crm\\DealFeed',
        1 => 'DeleteDealFeedItemRequest',
        2 => 'DeleteDealFeedItemResponseData',
        3 => 'DELETE',
        4 => '/deals/<deal_id>/feed/<i_id>',
        5 => [
            0 => 'deal_id',
            1 => 'i_id',
        ],
    ],
    154 => [
        0 => 'Crm\\Tasks',
        1 => 'ListEventsRequest',
        2 => 'ListEventsResponseData',
        3 => 'GET',
        4 => '/events',
        5 => [
        ],
    ],
    155 => [
        0 => 'Crm\\Tasks',
        1 => 'GetEventRequest',
        2 => 'GetEventResponseData',
        3 => 'GET',
        4 => '/events/<event_id>',
        5 => [
            0 => 'event_id',
        ],
    ],
    156 => [
        0 => 'Crm\\Tasks',
        1 => 'CreateEventRequest',
        2 => 'CreateEventResponseData',
        3 => 'POST',
        4 => '/events',
        5 => [
        ],
    ],
    157 => [
        0 => 'Crm\\Tasks',
        1 => 'UpdateEventRequest',
        2 => 'UpdateEventResponseData',
        3 => 'PUT',
        4 => '/events/<event_id>',
        5 => [
            0 => 'event_id',
        ],
    ],
    158 => [
        0 => 'Crm\\Tasks',
        1 => 'CloseEventRequest',
        2 => 'CloseEventResponseData',
        3 => 'POST',
        4 => '/events/<event_id>/close',
        5 => [
            0 => 'event_id',
        ],
    ],
    159 => [
        0 => 'Crm\\Tasks',
        1 => 'DeleteEventRequest',
        2 => 'DeleteEventResponseData',
        3 => 'DELETE',
        4 => '/events/<event_id>',
        5 => [
            0 => 'event_id',
        ],
    ],
    160 => [
        0 => 'Crm\\Calls',
        1 => 'ListCallsRequest',
        2 => 'ListCallsResponseData',
        3 => 'GET',
        4 => '/calls',
        5 => [
        ],
    ],
    161 => [
        0 => 'Crm\\Files',
        1 => 'GetFileRequest',
        2 => 'GetFileResponseData',
        3 => 'GET',
        4 => '/files/<file_id>',
        5 => [
            0 => 'file_id',
        ],
    ],
];
