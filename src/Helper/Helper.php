<?php

namespace App\Helper;

use Symfony\Component\HttpFoundation\Request;

abstract class Helper
{
    public static function isValidDate(string $date, string $format = 'Y/m/d H:i:s'): bool
    {
        $dateTime = \DateTime::createFromFormat($format, $date);

        return $dateTime && $dateTime->format($format) === $date;
    }

    public static function createFormOptionsByArray($array): array
    {
        $options = [];
        foreach ($array as $value) {
            $options[$value] = $value;
        }

        return $options;
    }

    public static function createPaginator(object|array $paginator, Request $request, string $baseUrl = ''): array
    {
        $paginator = is_array($paginator) ? $paginator : $paginator->toArray();

        if ($paginator['count'] == 0) {
            return [];
        }

        $links = [];
        $page = $paginator['page'];
        $pageSize = $paginator['pageSize'];
        $totalPages = ceil($paginator['totalCount'] / $pageSize);

        if ($totalPages <= 5) {
            $shownPages = [];
            for ($i = 1; $i <= $totalPages; $i++) {
                $shownPages[] = $i;
            }

            switch ($page) {
                case 1:
                    $shownPages[] = 'NEXT';
                    break;
                case $totalPages:
                    array_unshift($shownPages, 'PREV');
                    break;
                default:
                    array_unshift($shownPages, 'PREV');
                    $shownPages[] = 'NEXT';
                    break;
            }
        } else {
            switch ($page) {
                case 1:
                case 2:
                case 3:
                    $shownPages = [1, 2, 3, 4, 5, 'SPACER', 'NEXT', $totalPages];
                    break;
                case ($totalPages - 2):
                case ($totalPages - 1):
                case $totalPages:
                    $shownPages = [1, 'PREV', 'SPACER', $totalPages - 4, $totalPages - 3, $totalPages - 2, $totalPages - 1, $totalPages];
                    break;
                default:
                    $shownPages = [1, 'PREV', 'SPACER', $page - 2, $page - 1, $page, $page + 1, $page + 2, 'SPACER', 'NEXT', $totalPages];
                    break;
            }
        }

        foreach ($shownPages as $shownPage) {
            if ($shownPage === 'PREV') {
                $links[] = ['text' => 'Anterior', 'url' => sprintf('%s?page=%s&pageSize=%s', $baseUrl, ($page - 1), $pageSize)];

                continue;
            }

            if ($shownPage === 'NEXT') {
                $links[] = ['text' => 'Próxima', 'url' => sprintf('%s?page=%s&pageSize=%s', $baseUrl, ($page + 1), $pageSize)];

                continue;
            }

            if ($shownPage === 'SPACER') {
                $links[] = ['text' => '...', 'disabled' => true];

                continue;
            }

            if ($shownPage == $page) {
                $links[] = ['text' => $shownPage, 'active' => true, 'url' => sprintf('%s?page=%s&pageSize=%s', $baseUrl, $shownPage, $pageSize)];

                continue;
            }

            $links[] = ['text' => $shownPage, 'url' => sprintf('%s?page=%s&pageSize=%s', $baseUrl, $shownPage, $pageSize)];
        }

        if (! empty($request->get('card_filter'))) {
            foreach ($links as &$link) {
                if (! empty($link['url'])) {
                    $link['url'] .= '&' . http_build_query(self::arrayKeyChange($request->get('card_filter'), 'card_filter[', ']'));
                }
            }
        }

        return $links;
    }

    public static function arrayKeyChange($array, $prev, $next): array
    {
        $newArray = [];
        foreach ($array as $key => $value) {
            $newArray[$prev . $key . $next] = $value;
        }

        return $newArray;
    }
}
