<?php

class Calculate {
    private $numbers;

    public function __construct($numbers) {
        $this->numbers = $numbers;
    }

    public function response() {
        try {
            $good_json = $this->json_format();
            if (!$good_json) {
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

    private function json_format() {
        $obj = json_decode($this->numbers);
        if ($obj) {
            $this->numbers = $obj->numbers;
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function get_mean() {
        if (!empty($this->numbers)) {
            $count = count($this->numbers);
            $sum = array_sum($this->numbers);
            $result = $sum / $count;
            $result = round($result, 3);
        } else {
            $result = NULL;
        }
        return $result;
    }

    private function get_median() {
        if (!empty($this->numbers)) {
            sort($this->numbers);
            $count = count($this->numbers);
            $mid = floor(($count - 1) / 2);
            if ($count % 2 == 0) { // even
                $low = $this->numbers[$mid];
                $high = $this->numbers[$mid + 1];
                $median = (($low + $high) / 2);
            } else { // odd
                $median = $this->numbers[$mid];
            }
            return $median;
        } else {
            $result = NULL;
        }
        return $result;
    }

    private function get_mode() {
        if (!empty($this->numbers)) {
            $values = array_count_values($this->numbers);
            $max_value = max($values);
            $result = array_search($max_value, $values);
        } else {
            $result = NULL;
        }

        return $result;
    }

    private function get_range() {
        if (!empty($this->numbers)) {
            $min = min($this->numbers);
            $max = max($this->numbers);
            $result = $max - $min;
        } else {
            $result = NULL;
        }

        return $result;
    }
}
