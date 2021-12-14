<?php

namespace Helper;

use SimpleXLSX;

class DataProviders
{

    /**
     * @usage load test case tu file excel
     * @param $pathFile
     * @param int $workSheet or worksheetname
     * @param array $filters
     * @return array|null
     */
    public static function loadTestCase($pathFile, $workSheet = 0, $filters = [])
    {
        $workSheetIndex = 0;
        if ($xlsx = SimpleXLSX::parse($pathFile)) {
            if (is_string($workSheet)) {
                $sheetName = $xlsx->sheetNames();
                foreach ($sheetName as $key => $value) {
                    if ($workSheet == $value) {
                        $workSheetIndex = $key;
                    }
                }
            } else {
                $workSheetIndex = $workSheet;
            }
            // Produce array keys from the array values of 1st array element
            $header_values = $rows = [];
            foreach ($xlsx->rows($workSheetIndex) as $k => $r) {
                if ($k === 0) {
                    $header_values = $r;
                    continue;
                }
                $rows[] = array_combine($header_values, $r);
            }
            return DataProviders::filter($rows, $filters);
        }
        return null;
    }

    /**
     * @param array $data
     * @param array $filter
     * @return array|mixed
     * @usage bộ lọc đơn giản trước khi trả về dữ liệu.
     */
    public static function filter($data = [], $filter = [])
    {
        $return = [];
        if (!$filter) {
            return $data;
        }
        foreach ($filter as $kFilter => $option) {
            if (!is_array($option)) {
                foreach ($data as $key => $value) {
                    if ($data[$key][$kFilter] == $option) {
                        array_push($return, $data[$key]);
                    }
                }
            } else {
                $kOption = array_keys($option)[0];
                switch ($kOption) {
                    case '$in':
                        foreach ($option[$kOption] as $k => $v) {
                            foreach ($data as $key => $value) {
                                if ($data[$key][$kFilter] == $v) {
                                    array_push($return, $data[$key]);
                                }
                            }
                        }
                        break;
                    case '$nin':
                        foreach ($option[$kOption] as $k => $v) {
                            foreach ($data as $key => $value) {
                                if ($data[$key][$kFilter] == $v) {
                                    unset($data[$key]);
                                    $return = $data;
                                }
                            }
                        }
                        break;
                    case '$range':
                        break;

                }
            }
        }
        return $return;
    }

}

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);