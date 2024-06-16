<?php

namespace Src\Service;

use JetBrains\PhpStorm\NoReturn;


class BaseService
{
    /**
     * Displays the contents of a variable and stops script execution.
     *
     * This method outputs a formatted view of the given variable and terminates
     * the script. It is useful for debugging purposes.
     *
     * @param       mixed $value The variable to display.
     * @return      void
     * @throws      void This method does not throw any exceptions.
     * @deprecated  This method is not deprecated.
     * @example     BaseService::dd($array);
     */
    #[NoReturn] public static function dd(mixed $value): void
    {
        echo '<pre>';
        print_r(htmlspecialchars(print_r($value, true)));
        echo '</pre>';
        die();
    }

    /**
     * Displays the contents of a variable and optionally stops script execution.
     *
     * This method outputs a detailed view of the given variable using var_dump.
     * Optionally, it can terminate the script after displaying the variable.
     *
     * @param       mixed $value The variable to display.
     * @param       bool $die If true, stops the script after displaying the variable's content. Default is false.
     * @return      void
     * @throws      void This method does not throw any exceptions.
     * @deprecated  This method is not deprecated.
     * @example     BaseService::dumb($array, true);
     */
    #[NoReturn] public static function dumb(mixed $value, bool $die = false): void
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        if ($die) die();
    }

    /**
     * Renders a view with the given data.
     *
     * This method includes the specified view file and passes the provided data
     * to it. It also includes common header and footer files.
     *
     * @param       string $view The name of the view file to render.
     * @param       array $data The data to be extracted and passed to the view.
     * @return      void
     * @throws      void This method does not throw any exceptions.
     * @deprecated  This method is not deprecated.
     * @example     BaseService::render('home', $data);
     */
    public static function render(string $view, array $data = []): void
    {
        extract($data);
        include VIEW . '_inc/_header' . PHP;
        include VIEW . $view . PHP;
        include VIEW . '_inc/_footer' . PHP;
    }

    /**
     * Redirects the user to a specified URL.
     *
     * This method sends an HTTP header to redirect the user to the given URL and
     * then terminates the script.
     *
     * @param       string $url The URL to redirect to.
     * @return      void
     * @throws      void This method does not throw any exceptions.
     * @deprecated  This method is not deprecated.
     * @example     BaseService::redirect('/login');
     */
    #[NoReturn] protected static function redirect(string $url): void
    {
        header('Location:' . $url);
        exit();
    }

    /**
     * Sanitizes user input by trimming whitespace and converting special characters to HTML entities.
     *
     * This method removes leading and trailing whitespace from the input and converts
     * special characters to HTML entities to prevent XSS attacks.
     *
     * @param       string $input The input value to sanitize.
     * @return      string The sanitized input string.
     * @throws      void This method does not throw any exceptions.
     * @deprecated  This method is not deprecated.
     * @example     $sanitizedInput = BaseService::sanitize_input($rawInput);
     */
    public static function sanitize_input(string $input): string
    {
        return trim(htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));
    }

    /**
     * Formats a French phone number.
     *
     * This method formats a given French phone number into a readable format,
     * handling special cases for short and international numbers.
     *
     * @param       string $phoneNumber The phone number to format.
     * @return      string The formatted phone number.
     * @throws      void This method does not throw any exceptions.
     * @deprecated  This method is not deprecated.
     * @example     $formattedNumber = BaseService::formatPhoneNumber('0652601358');
     */
    public static function formatPhoneNumber(string $phoneNumber): string
    {
        // Remove all non-numeric characters
        $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Check the length of the cleaned number
        $length = strlen($cleaned);

        // Short special numbers (e.g., 3900)
        if ($length === 4 || $length === 5) {
            return $cleaned;
        }

        // Special numbers starting with 08
        if (preg_match('/^08\d{8}$/', $cleaned)) {
            return preg_replace('/(\d)(\d{3})(\d{3})(\d{3})/', '$1 $2 $3 $4', $cleaned);
        }

        // Standard French phone numbers (10 digits)
        if ($length === 10) {
            return preg_replace('/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/', '$1 $2 $3 $4 $5', $cleaned);
        }

        // International format (e.g., +33 6 12 34 56 78)
        if ($length === 11 && str_starts_with($cleaned, '0')) {
            return '+33 ' . preg_replace('/(\d)(\d{2})(\d{2})(\d{2})(\d{2})/', '$1 $2 $3 $4 $5', substr($cleaned, 1));
        }

        // Long international format (e.g., +33 1 23 45 67 89)
        if ($length === 12 && str_starts_with($cleaned, '33')) {
            return '+33 ' . preg_replace('/(\d)(\d{2})(\d{2})(\d{2})(\d{2})/', '$1 $2 $3 $4 $5', substr($cleaned, 2));
        }

        // Return the cleaned number if it doesn't match any expected formats
        return $cleaned;
    }
}