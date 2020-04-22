<?php
namespace App;

use App\Request;
use App\Response;
use App\Routing;

class Http
{
   
   private $request;

   private $response;

   private $uri;

   private $method;

   public function __construct()
   {
      $this->request = new Request();
      $this->response = new Response();

      $this->method = $this->request->method();
      $this->uri = $this->request->uri();
   }

   public function get(string $route, string $next)
   {
      // restrict to only GET requests
      if ($this->method != "GET") {
         return;
      }

      $this->handle_request($route, $next);
   }

   public function post(string $route, $next)
   {
      // restrict to only POST requests
      if ($this->method != "POST") {
         return;
      }

      $this->handle_request($route, $next);
   }

   public function put(string $route, $next)
   {
      // restrict to only PUT requests
      if ($this->method != "PUT") {
         return;
      }

      $this->handle_request($route, $next);
   }

   public function patch(string $route, $next)
   {
      // restrict to only PATCH requests
      if ($this->method != "PATCH") {
         return;
      }

      $this->handle_request($route, $next);
   }

   public function delete(string $route, $next)
   {
      // restrict to only PATCH requests
      if ($this->method != "PATCH") {
         return;
      }

      $this->handle_request($route, $next);
   }

   private function handle_request(string $route, $next)
   {
      // compare the uri with the route
      list($status, $route_params) = Routing::compare($route, $this->uri);
      // list($status, $route_params) = Routing::compare($route, self::$uri);

      // if comparison fails
      if ($status == false) {
         return;
      }
   
      // set the route parameter property of Request
      $this->request->set_route_params($route_params);

      // set a default response header for the request

      // check if next is a function, and execute it
      if (\is_callable($next)) {
         $next($this->request, $this->response);
      }
      // else if it is a string
      elseif (\is_string($next)) {
         // then call the controller method -> next
         Routing::route($next, $this->request, $this->response);
      }
   }

   public function end()
   {
      $this->response->not_found();
   }

   public static function middleware()
   {
      return self;
   }

   public static function auth()
   {
      return self;
   }

   public static function guard()
   {
      
   }

   public function __desctruct()
   {
      $this->request = null;
   }

}