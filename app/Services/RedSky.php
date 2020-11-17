<?php namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Class RedSky
 * @package App\Services
 */
class RedSky
{
    protected $baseUri;

    /**
     * @var Client
     */
    protected $client;

    /**
     * RedSky constructor.
     * @param float $timeout
     */
    function __construct($timeout = 2.0)
    {
        $this->baseUri  = config('redsky.baseUri');
        $this->client   = new Client([
            'base_uri'  => $this->baseUri,
            'timeout'   => $timeout
        ]);
    }

    /**
     * @param $id
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findProductById($id)
    {
        try {
            $response = $this->client->request('GET', $id, ['query' => $this->getQueryParams()]);

            return json_decode((string) $response->getBody());
        } catch (Exception $exception) {
            throw new Exception("RedSkey Product with id {$id} Not Found", 404);
        }
    }

    /**
     * @return array
     */
    private function getQueryParams(): array
    {
        return [
            'excludes'  => 'taxonomy,price,promotion,bulk_ship,rating_and_reviews,rating_and_review_statistics,question_answer_statistics',
            'key'       => 'candidate'
        ];
    }
}