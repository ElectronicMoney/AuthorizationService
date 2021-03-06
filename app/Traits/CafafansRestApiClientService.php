<?php

namespace App\Traits;

use GuzzleHttp\Client;


trait CafafansRestApiClientService
{
    /**
     * Send a request to any service
     *
     * @param  string|array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function httpRequest($method, $path, $formParams = [], $headers = []) {
        //Instantiate the GazzleHttp Client
        $client = new Client([
            'base_uri' => $this->baseUri,
            'timeout' => 5.0,
        ]);
 
        //Create a request
        $response = $client->request($method, $path, ['form_params' => $formParams, 'headers' => $headers]);
        //Return a response
        return $response;
    }

    /**
     * creating an author from micro service
     * @param array $data
     * @return string
     */
    public function postService($path, $data) {
        return $this->httpRequest('POST', $path, $data);
    }

    /**
     * Fetching the list of from the micro service
     * @param void
     * @return string
     */
    public function getServices($path) {
        return $this->httpRequest('GET', $path);
    }

    /**
     * Fetching an author instance from micro service
     * @param int $serviceId
     * @return string
     */
    public function getService($path, $serviceId) {
        return $this->httpRequest('GET', "{$path}/{$serviceId}");
    }

    /**
     * updating an author instance using micro service
     * @param array $data
     * @param int $serviceId
     * @return string
     */
    public function putService($path, $data, $serviceId) {
        return $this->httpRequest('PUT', "{$path}/{$serviceId}", $data);
    }

    /**
     * updating an author instance using micro service
     * @param array $data
     * @param int $serviceId
     * @return string
     */
    public function patchService($path, $data, $serviceId) {
        return $this->httpRequest('PATCH', "{$path}/{$serviceId}", $data);
    }

    /**
     * Deleting an author instance from micro service
     * @param int $serviceId
     * @return string
     */
    public function deleteService($path, $serviceId) {
        return $this->httpRequest('DELETE', "{$path}/{$serviceId}");
    }

}
