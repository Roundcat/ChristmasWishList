<?php

class Recaptcha {

  // Déclaration des variables en privé
  private $api_secret;
  private $api_site;

  // constructeur
  function __construct($api_site, $api_secret) {
    $this->api_secret = $api_secret; // initialisation
    $this->api_site = $api_site; // initialisation
  }

  /**
    * Permet de générer le code html du captcha
    * @return string
  */
  public function html() {
    return '<div class="g-recaptcha" data-sitekey="' . $this->api_site . '"></div>';
  }

  /**
  * Génère la balise <script> pour recaptcha
  * @return string
  */
  public function script() {
    return '<script src="https://www.google.com/recaptcha/api.js"></script>';
  }

  /**
    * Permet de vérifier la réponse donnée par recaptcha
    * @param string $code
    * @param null $ip
    * @return bool
  */
  public function isValid($code, $ip = null) {
    if (empty($code)) {
      return false;
    }

    $params = [
      'secret' => $this->api_secret,
      'response' => $code
    ];
    if ($ip) {
      $params['remoteip'] = $ip;
    }

    $url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);

    if (function_exists('curl_version')) {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_TIMEOUT, 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($curl);
    } else {
      // si curl n'est pas activé
      $response = file_get_contents($url);
    }

    if (empty($response) || is_null($response)) {
      return false;
    }

    $json = json_decode($response);
    return $json->success;

  }
}
?>
