<?php

namespace F0\LaravelMoodleClient\Clients;

/**
 * Class HttpClient
 * @package F0\LaravelMoodleClient\Clients
 *
 * @method HttpClient getClient()
 */
class HttpClient
{

  /**
   * @var string
   */
  protected $base_url;

  /**
   * HttpClient constructor.
   * @param Array $data
   * @param string $responseFormat
   */
  public function __construct($data)
  {
      $this->base_url = $data['base_url'];
  }

  /**
   * Send POST request
   * @param array $arguments
   * @return array|bool|float|int|\SimpleXMLElement|string
   */
  public function post(array $arguments = [])
  {
      $arguments = http_build_query($arguments);
      $context_options = array (
              'http' => array (
                  'method' => 'POST',
                  'header'=> "Content-type: application/x-www-form-urlencoded\r\n"
                      . "Content-Length: " . strlen($arguments) . "\r\n",
                  'content' => $arguments
                  )
              );

      $context = stream_context_create($context_options);
      $result = file_get_contents($this->base_url, false, $context);
    //if ($result === FALSE) { /* Handle error */ }

      // Convert to array
      return json_decode($result, true);
  }


}
