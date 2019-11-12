<?php

/**
 * Validation language strings.
 *
 * @package    CodeIgniter
 * @author     CodeIgniter Dev Team
 * @copyright  2014-2019 British Columbia Institute of Technology (https://bcit.ca/)
 * @license    https://opensource.org/licenses/MIT MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
 *
 * @codeCoverageIgnore
 */

return [
    // Core Messages
    'noRuleSets' => 'У конфігурації перевірки не вказані набори правил.',

    'ruleNotFound' => '{0} не є допустимим правилом.',

    'groupNotFound' => '{0} не є групою правил перевірки.',

    'groupNotArray' => '{0} група правил має бути масивом.',

    'invalidTemplate' => '{0} не є допустимим шаблоном перевірки.',

// Rule Messages

    'alpha' => 'Поле {field} може містити тільки букви алфавіту.',

    'alpha_dash' => 'Поле {field} може містити тільки буквено-цифрові символи, підкреслення і тире.',

    'alpha_numeric' => 'Поле {field} може містити тільки буквено-цифрові символи.',

    'alpha_numeric_space' => 'Поле {field} може містити тільки буквено-цифрові символи і пропуски.',

    'alpha_space' => 'Поле {field} може містити тільки алфавітні символи і пропуски.',

    'decimal' => 'Поле {field} повинне містити десяткове число.',

    'differs' => 'Поле {field} повинно відрізнятися від поля {param}.',

    'equals' => 'Поле {field} має бути точне {param}.',

    'exact_length' => 'Поле {field} повинно бути завдовжки рівно {param} символів.',

    'greater_than' => 'Поле {field} повинно містити число більше, ніж {param}.',

    'greater_than_equal_to' => 'Поле {field} повинне містити число, більше або рівніше {param}.',

    'in_list' => 'Поле {field} має бути одним з: {param}.',

    'integer' => 'Поле {field} повинне містити ціле число.',

    'is_natural' => 'Поле {field} повинно містити тільки цифри.',

    'is_natural_no_zero' => 'Поле {field} повинно містити тільки цифри і має бути більше нуля.',

    'is_unique' => 'Поле {field} повинне містити унікальне значення.',

    'less_than' => 'Поле {field} повинно містити число менше {param}.',

    'less_than_equal_to' => 'Поле {field} повинне містити число, менше або рівніше {param}.',

    'matches' => 'Поле {field} не відповідає полю {param}.',

    'max_length' => 'Довжина поля {field} не може перевищувати {param} символів.',

    'min_length' => 'Поле {field} повинно бути завдовжки не менше {param} символів.',

    'not_equals' => 'Поле {field} не може бути {param}.',

    'numeric' => 'Поле {field} повинно містити тільки цифри.',

    'regex_match' => 'Поле {field} має невірний формат.',

    'required' => 'Поле {field} обов\'язково для заповнення.',

    'required_with' => 'Поле {field} обов\'язково для заповнення, коли є присутнім {param}.',

    'required_without' => 'Поле {field} є обов\'язковим, коли {param} відсутній.',

    'timezone' => 'Поле {field} має бути дійсним часовим поясом.',

    'valid_base64' => 'Поле {field} має бути допустимим рядком base64.',

    'valid_email' => 'Поле {field} повинно містити дійсну адресу електронної пошти.',

    'valid_emails' => 'Поле {field} повинно містити усі дійсні адреси електронної пошти.',

    'valid_ip' => 'Поле {field} повинно містити дійсну IP.',

    'valid_url' => 'Поле {field} повинно містити дійсну URL.',

    'valid_date' => 'Поле {field} повинно містити дійсну дату.',

// Credit Cards

    'valid_cc_num' => '{field} не є дійсним номером кредитної карти.',

// Files

    'uploaded' => '{field} не є допустимим завантаженим файлом.',

    'max_size' => '{field} занадто великий файл.',

    'is_image' => '{field} не є допустимим завантаженим файлом зображення.',

    'mime_in' => '{field} не має допустимого типу MIME.',

    'ext_in' => '{field} не має допустимого розширення файлу.',

    'max_dims' => '{field} або не є зображенням, або воно занадто широке або високе.',
];
