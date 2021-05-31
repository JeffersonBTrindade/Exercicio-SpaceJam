<?php

namespace Forseti\ExSpacejam\PageObject;

use Forseti\ExSpacejam\Traits\ForsetiLoggerTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class AbstractPageObject
{
    use ForsetiLoggerTrait;
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function request($method, $uri, array $options = [])
    {
        try {
            return $this->client->request($method, $uri, $options);
        } catch (GuzzleException $e) {
            $this->error('Erro ao tentar requisicao', ['exception' => $e]);
            return null;
        } catch (\Exception $e) {
            $this->error('Erro ao tentar requisicao', ['exception' => $e]);
            return null;
        }
    }
}