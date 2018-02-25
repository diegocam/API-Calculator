<?php

/**
 * Class Calculate
 */
class Calculate
{
    /**
     * @var
     */
    private $json;

    /**
     * Calculate constructor.
     * @param $numbers
     */
    public function __construct($json)
    {
        $this->json = $json;
    }

    /**
     * @return array
     */
    public function response()
    {
        try {
            if (!$this->checkJson()) {
                throw new Exception('Problem with JSON format');
            }
            $response = array(
                "results" => array(
                    "mean" => $this->get_mean(),
                    "median" => $this->get_median(),
                    "mode" => $this->get_mode(),
                    "range" => $this->get_range()
                )
            );
        } catch (Exception $e) {
            $response = array(
                "error" => array(
                    "code" => 500,
                    "message" => $e->getMessage()
                )
            );
        }
        return $response;
    }

    /**
     * @return bool
     */
    private function checkJson()
    {
        $this->json = json_decode($this->json);
        return is_object($this->json) && $this->json->numbers;
    }

    /**
     * @return float|int|null
     */
    private function get_mean()
    {
        if (!empty($this->json->numbers)) {
            $count = count($this->json->numbers);
            $sum = array_sum($this->json->numbers);
            $result = $sum / $count;
            $result = round($result, 3);
        } else {
            $result = NULL;
        }
        return $result;
    }

    /**
     * @return float|int|null
     */
    private function get_median()
    {
        if (!empty($this->json->numbers)) {
            sort($this->json->numbers);
            $count = count($this->json->numbers);
            $mid = floor(($count - 1) / 2);
            if ($count % 2 == 0) { // even
                $low = $this->json->numbers[$mid];
                $high = $this->json->numbers[$mid + 1];
                $median = (($low + $high) / 2);
            } else { // odd
                $median = $this->json->numbers[$mid];
            }
            return $median;
        } else {
            $result = NULL;
        }
        return $result;
    }

    /**
     * @return false|int|null|string
     */
    private function get_mode()
    {
        if (!empty($this->json->numbers)) {
            $values = array_count_values($this->json->numbers);
            $max_value = max($values);
            $result = array_search($max_value, $values);
        } else {
            $result = NULL;
        }

        return $result;
    }

    /**
     * @return mixed|null
     */
    private function get_range()
    {
        if (!empty($this->json->numbers)) {
            $min = min($this->json->numbers);
            $max = max($this->json->numbers);
            $result = $max - $min;
        } else {
            $result = NULL;
        }

        return $result;
    }
}
