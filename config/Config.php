<?php

namespace SMS;

/**
 * Class Config
 *
 * @package SMS
 */
class Config
{
    /**
     * Config property
     *
     * @var array
     */
    static $config = [
        'Nexmo' => [
            'key'            => 'Your api key here',
            'secret'         => 'Your api secret here',
            'url'            => 'https://rest.nexmo.com/sms/json?',
            'maxMessageSize' => 100,
            'statusCodes'    => [
                0   => 'Success: The message was successfully accepted for delivery by Nexmo',
                1   => 'Throttled: You have exceeded the submission capacity allowed on this account, please back-off and retry',
                2   => 'Missing params: Your request is incomplete and missing some mandatory parameters',
                3   => 'Invalid params: The value of one or more parameters is invalid',
                4   => 'Invalid credentials: The api_key / api_secret you supplied is either invalid or disabled',
                5   => 'Internal error: An error has occurred in the Nexmo platform whilst processing this message',
                6   => 'Invalid message: The Nexmo platform was unable to process this message, for example, an un-recognized number prefix or the number is not whitelisted if your account is new',
                7   => 'Number barred: The number you are trying to submit to is blacklisted and may not receive messages',
                8   => 'Partner account barred: The api_key you supplied is for an account that has been barred from submitting messages',
                9   => 'Partner quota exceeded: Your pre-pay account does not have sufficient credit to process this message',
                11  => 'Account not enabled for REST: This account is not provisioned for REST submission, you should use SMPP instead',
                12  => 'Message too long: Applies to Binary submissions, where the length of the UDH and the message body combined exceed 140 octets',
                13  => 'Communication Failed: Message was not submitted because there was a communication failure',
                14  => 'Invalid Signature: Message was not submitted due to a verification failure in the submitted signature',
                15  => 'Invalid sender address: The sender address (from parameter) was not allowed for this message. Restrictions may apply depending on the destination see our FAQs',
                16  => 'Invalid TTL: The ttl parameter values is invalid',
                19  => 'Facility not allowed: Your request makes use of a facility that is not enabled on your account',
                20  => 'Invalid Message class: The message class value supplied was out of range (0 - 3)',
                999 => 'Debugging',
            ],
            'debug'          => true,
        ],
    ];

    /**
     * Get configuration
     *
     * @param string $gateway Gateway to settings for
     *
     * @return array Configuration array
     */
    public static function get($gateway)
    {
        return self::$config[$gateway];
    }
}