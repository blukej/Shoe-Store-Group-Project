<?php namespace Rapid; ?>
<?php

  /**
   * This is the Rapid MVC framework created for GD2/CO2a
   * Web Development (2018/19) CA3. This version has no
   * in-built support or helpers for Models, so it is really
   * just a VC framework (we'll add models later).
   *
   * Implementation details are described in comments in
   * this file. Usage details will be documented in a
   * README.md file in the root of this project.
   *
   * To limit the number of requires needed per request,
   * all of this library in included in this one file.
   *
   * This library makes use of a namespace. To access the
   * classes in this library, you must reference their
   * namespace:
   *    Wont' work: new Request();
   *    Will work : new \Rapid\Request();
   * Lear more about namespaces at:
   *    https://php.net/manual/en/language.namespaces.php
   */

  ##########################################################
  #### !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! #####
  #### !!! YOU SHOULD NEVER NEED TO EDIT THIS FILE !!! #####
  #### !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! #####
  ##########################################################


  ##########################################################
  # Exceptions
  ##########################################################


  ##########################################################
  # Request
  ##########################################################

  class Request {

    private $basePath;
    private $params;
    private $query;
    private $body;
    private $headers;
    private $remote_ip;
    private $method;
    private $url;

    public function __construct() {
      $this->basePath  = dirname($_SERVER['PHP_SELF']);
      $this->params    = NULL;
      $this->query     = $_GET;
      $this->body      = $_POST;
      $this->headers   = getallheaders();
      $this->remoteIp  = $_SERVER['REMOTE_ADDR'];
      $this->method    = $_SERVER['REQUEST_METHOD'];
      $this->url       = $this->getLocalPath();
    }

    /**
     * Utility method to get the requested path, minus the base
     * path of the current script (relative to the document root).
     */
    private function getLocalPath() {

      // Get requested path, minus a query string if there is one
      $localPath = explode('?', $_SERVER['REQUEST_URI'])[0];

      // Get requested path, minus the fragment string if there is one
      $localPath = explode('#', $localPath)[0];

      // Remove basePath from localPath
      // Snippet taken from https://stackoverflow.com/questions/4517067
      // ^^^ That's a reference
      if (substr($localPath, 0, strlen($this->basePath)) === $this->basePath) {
        $localPath = substr($localPath, strlen($this->basePath));
      }

      return $localPath;
    }

    /**
     * Params will have to be set later than instantiation.
     * However, once set, we don't want the param array to be
     * mutable, so we will make sure they can only be set once
     */
    public function setParamsOnce($params) {
      if ($this->params === NULL && is_array($params)) {
        $this->params = $params;
      }
    }

  }


  ##########################################################
  # Response
  ##########################################################

  class Response {

    public function __construct() {
      throw new Exception('Response class has not yet been implemented');
    }

  }


  ##########################################################
  # Renderer
  ##########################################################

  class Renderer {

    public function __construct() {
      throw new Exception('Renderer class has not yet been implemented');
    }

  }


  ##########################################################
  # Router
  ##########################################################

  class Router {

    public function __construct() {
      throw new Exception('Router class has not yet been implemented');
    }

  }

?>