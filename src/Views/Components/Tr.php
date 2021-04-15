<?php

namespace JGile\BladeComponents\Views\Components;

use Illuminate\View\Component;

class Tr extends Component
{
    protected array $data;
    protected array $headers;

    public function __construct($data = null, $headers = null, array $only = null)
    {
        $this->data = $this->normalizeRow($data, $only);
        $this->headers = $this->normalizeRow($headers, $only);
    }

    public function normalizeRow($data, $only)
    {
        $returnData = [];

        if ($only && $data) {
            foreach ($only as $key) {
                $returnData[] = ['key' => $key, 'value' => data_get($data, $key)];
            }
        } elseif (is_array($data)) {
            foreach ($data as $key => $value) {
                $returnData[] = ['key' => $key, 'value' => $value];
            }
        }

        return $returnData;
    }

    public function render()
    {
        return view("blade-components::components.table-row", [
            'data' => empty($this->data) ? null : $this->data,
            'headers' => empty($this->headers) ? null : $this->headers,
        ]);
    }
}