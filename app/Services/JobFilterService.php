<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

class JobFilterService
{

    public function applyFilters(Builder $query, $filter)
    {
        $filters = $this->parseFilter($filter);

        foreach ($filters as $field => $conditions) {
            foreach ($conditions as $condition) {
                if (strpos($field, 'attribute:') === 0) {
                    $attributeName = substr($field, 9);
                    $query->whereHas('attributes', function ($q) use ($attributeName, $condition) {
                        $q->where('name', $attributeName)
                            ->where('value', $condition['operator'], $condition['value'][0]);
                    });
                } elseif ($condition['operator'] == 'HAS_ANY' || $condition['operator'] == 'IS_ANY') {
                    $query->whereHas($field, function ($q) use ($condition) {
                        if (is_array($condition['value'])) {
                            $q->whereIn('name', $condition['value']);
                        } else {
                            throw new \Exception("Expected array for HAS_ANY/IS_ANY condition");
                        }
                    });
                } else {
                    $value = $condition['value'];
                    if (!is_array($value)) {
                        $value = [$value];
                    }

                    if (count($value) == 1) {
                        $query->where($field, $condition['operator'], $value[0]);
                    } else {
                        $query->whereIn($field, $value);
                    }
                }
            }
        }

        return $query;
    }

    protected function parseFilter($filter)
    {
        $filters = [];

        preg_match_all('/(\w+)(=|!=|>|<|>=|<=|IN|HAS_ANY|IS_ANY|:)(\([^)]+\)|[^\s()]+)/i', $filter, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $field = $match[1];
            $operator = $match[2];
            $value = $match[3];

            if ($operator == 'HAS_ANY' || $operator == 'IS_ANY') {
                $value = trim($value, '()');
                $value = explode(',', $value);
                $value = array_map('trim', $value);
            } elseif ($operator == ':') {
                $filters[$field][] = ['operator' => $operator, 'value' => [$value]];
                continue;
            } else {
                if ($operator == 'IN') {
                    $value = explode(',', $value);
                    $value = array_map('trim', $value);
                } else {
                    $value = trim($value);
                }
            }

            $filters[$field][] = ['operator' => $operator, 'value' => $value];
        }

        return $filters;
    }
}
