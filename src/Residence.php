<?php

namespace KominfoHSS\Residence;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

/**
 * Class Residence
 * @package KominfoHSS\Residence
 */
class Residence
{
    /**
     * @var PendingRequest
     */
    protected PendingRequest $client;

    /**
     * @var array
     */
    protected array $query = [];

    /**
     * Residence constructor.
     */
    public function __construct()
    {
        $this->client = Http::withHeaders([
            'X-ORIGIN' => config('residence.origin'),
        ]);

        $this->query = array_merge($this->query, [
            'key' => config('residence.key'),
        ]);
    }

    /**
     * @return $this
     */
    public function family() : Residence
    {
        return $this->query([
            'with' => 'families',
        ]);
    }

    /**
     * @param  array $query
     * @return Collection
     */
    public function list(array $query = []) : Collection
    {
        return $this->get('residence', $query);
    }

    /**
     * @param  int   $card
     * @param  array $query
     * @return Collection
     */
    public function personal(int $card, array $query = []) : Collection
    {
        return $this->get('residence/personal/' . $card, $query);
    }

    /**
     * @param  int   $family
     * @param  array $query
     * @return Collection
     */
    public function register(int $family, array $query = []) : Collection
    {
        return $this->get('residence/register/' . $family, $query);
    }

    /**
     * @param  array $query
     * @return Residence
     */
    protected function query(array $query) : Residence
    {
        $this->query = array_merge($this->query, $query);

        return $this;
    }

    /**
     * @param  string $url
     * @param  array  $query
     * @return Collection
     */
    protected function get(string $url, array $query = []) : Collection
    {
        return collect($this->client->acceptJson()
            ->get($this->appendURL($url), $this->query($query)->query)
            ->json());
    }

    /**
     * @param  string $url
     * @return string
     */
    protected function appendURL(string $url) : string
    {
        $endpoint = parse_url(config('residence.endpoint'));

        if (isset($endpoint['scheme'])) {
            $endpoint = $endpoint['host'];
        } else {
            $endpoint = str_replace('/', '', $endpoint['path']);
        }

        return 'https://' . preg_replace('/\/+/', '/', $endpoint . '/v1/' . $url);
    }
}
