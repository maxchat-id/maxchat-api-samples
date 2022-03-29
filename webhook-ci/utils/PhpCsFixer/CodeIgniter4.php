<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Utils\PhpCsFixer;

use Nexus\CsConfig\Ruleset\AbstractRuleset;

/**
 * Defines the ruleset used for the CodeIgniter4 organization.
 *
 * @internal
 */
final class CodeIgniter4 extends AbstractRuleset
{
    public function __construct()
    {
        $this->name = 'CodeIgniter4 Revised Coding Standards';

        $this->rules = [
            'align_multiline_comment' => ['comment_type' => 'phpdocs_only'],
            'array_indentation'       => true,
            'array_push'              => true,
            'array_syntax'            => ['syntax' => 'short'],
            'backtick_to_shell_exec'  => true,
            'binary_operator_spaces'  => [
                'default'   => 'single_space',
                'operators' => [
                    '='  => 'align_single_space_minimal',
                    '=>' => 'align_single_space_minimal',
                    '||' => 'align_single_space_minimal',
                    '.=' => 'align_single_space_minimal',
                ],
            ],
            'blank_line_after_namespace'   => true,
            'blank_line_after_opening_tag' => true,
            'blank_line_before_statement'  => [
                'statements' => [
                    'case',
                    'continue',
                    'declare',
                    'default',
                    'do',
                    'exit',
                    'for',
                    'foreach',
                    'goto',
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'while',
                    'yield',
                    'yield_from',
                ],
            ],
            'braces' => [
                'allow_single_line_anonymous_class_with_empty_body' => true,
                'allow_single_line_closure'                         => true,
                'position_after_anonymous_constructs'               => 'same',
                'position_after_control_structures'                 => 'same',
                'position_after_functions_and_oop_constructs'       => 'next',
            ],
            'cast_spaces'                 => ['space' => 'single'],
            'class_attributes_separation' => [
                'elements' => [
                    // 'const' => 'one_if_phpdoc', // @todo Enable in php-cs-fixer v3.1
                    // 'property' => 'one_if_phpdoc', // @todo Enable in php-cs-fixer v3.1
                    'method' => 'one',
                ],
            ],
            'class_definition' => [
                'multi_line_extends_each_single_line' => true,
                'single_item_single_line'             => true,
                'single_line'                         => true,
            ],
            'class_keyword_remove'       => false,
            'clean_namespace'            => true,
            'combine_consecutive_issets' => true,
            'combine_consecutive_unsets' => true,
            'combine_nested_dirname'     => true,
            'comment_to_phpdoc'          => [
                'ignored_tags' => [
                    'todo',
                    'codeCoverageIgnore',
                    'codeCoverageIgnoreStart',
                    'codeCoverageIgnoreEnd',
                    'phpstan-ignore-line',
                    'phpstan-ignore-next-line',
                ],
            ],
            'compact_nullable_typehint'            => true,
            'concat_space'                         => ['spacing' => 'one'],
            'constant_case'                        => ['case' => 'lower'],
            'date_time_immutable'                  => false,
            'declare_equal_normalize'              => ['space' => 'none'],
            'declare_strict_types'                 => false,
            'dir_constant'                         => true,
            'doctrine_annotation_array_assignment' => false,
            'doctrine_annotation_braces'           => false,
            'doctrine_annotation_indentation'      => false,
            'doctrine_annotation_spaces'           => false,
            'echo_tag_syntax'                      => [
                'format'                         => 'short',
                'long_function'                  => 'echo',
                'shorten_simple_statements_only' => false,
            ],
            'elseif'            => true,
            'encoding'          => true,
            'ereg_to_preg'      => true,
            'error_suppression' => [
                'mute_deprecation_error'         => true,
                'noise_remaining_usages'         => false,
                'noise_remaining_usages_exclude' => [],
            ],
            'escape_implicit_backslashes' => [
                'double_quoted'  => true,
                'heredoc_syntax' => true,
                'single_quoted'  => false,
            ],
            'explicit_indirect_variable' => true,
            'explicit_string_variable'   => true,
            'final_class'                => false,
            'final_internal_class'       => [
                'annotation_exclude'                         => ['@no-final'],
                'annotation_include'                         => ['@internal'],
                'consider_absent_docblock_as_internal_class' => false,
            ],
            'final_public_method_for_abstract_class' => false,
            'fopen_flag_order'                       => true,
            'fopen_flags'                            => ['b_mode' => true],
            'full_opening_tag'                       => true,
            'fully_qualified_strict_types'           => true,
            'function_declaration'                   => ['closure_function_spacing' => 'one'],
            'function_to_constant'                   => [
                'functions' => [
                    'get_called_class',
                    'get_class',
                    'get_class_this',
                    'php_sapi_name',
                    'phpversion',
                    'pi',
                ],
            ],
            'function_typehint_space'          => true,
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    'author',
                    'package',
                    'subpackage',
                ],
            ],
            'general_phpdoc_tag_rename' => [
                'case_sensitive' => false,
                'fix_annotation' => true,
                'fix_inline'     => true,
                'replacements'   => ['inheritDocs' => 'inheritDoc'],
            ],
            'global_namespace_import'     => false,
            'group_import'                => false,
            'header_comment'              => false, // false by default
            'heredoc_indentation'         => ['indentation' => 'start_plus_one'],
            'heredoc_to_nowdoc'           => true,
            'implode_call'                => true,
            'include'                     => true,
            'increment_style'             => ['style' => 'post'],
            'indentation_type'            => true,
            'is_null'                     => true,
            'lambda_not_used_import'      => true,
            'line_ending'                 => true,
            'linebreak_after_opening_tag' => true,
            'list_syntax'                 => ['syntax' => 'short'],
            'logical_operators'           => true,
            'lowercase_cast'              => true,
            'lowercase_keywords'          => true,
            'lowercase_static_reference'  => true,
            'magic_constant_casing'       => true,
            'magic_method_casing'         => true,
            'mb_str_functions'            => false,
            'method_argument_space'       => [
                'after_heredoc'                    => false,
                'keep_multiple_spaces_after_comma' => false,
                'on_multiline'                     => 'ensure_fully_multiline',
            ],
            'method_chaining_indentation'                 => true,
            'modernize_types_casting'                     => true,
            'multiline_comment_opening_closing'           => true,
            'multiline_whitespace_before_semicolons'      => ['strategy' => 'no_multi_line'],
            'native_constant_invocation'                  => false,
            'native_function_casing'                      => true,
            'native_function_invocation'                  => false,
            'native_function_type_declaration_casing'     => true,
            'new_with_braces'                             => true,
            'no_alias_functions'                          => ['sets' => ['@all']],
            'no_alias_language_construct_call'            => true,
            'no_alternative_syntax'                       => false,
            'no_binary_string'                            => true,
            'no_blank_lines_after_class_opening'          => true,
            'no_blank_lines_after_phpdoc'                 => true,
            'no_blank_lines_before_namespace'             => false, // conflicts with `single_blank_line_before_namespace`
            'no_break_comment'                            => ['comment_text' => 'no break'],
            'no_closing_tag'                              => true,
            'no_empty_comment'                            => true,
            'no_empty_phpdoc'                             => true,
            'no_empty_statement'                          => true,
            'no_extra_blank_lines'                        => ['tokens' => ['extra']],
            'no_homoglyph_names'                          => true,
            'no_leading_import_slash'                     => true,
            'no_leading_namespace_whitespace'             => true,
            'no_mixed_echo_print'                         => ['use' => 'echo'],
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_null_property_initialization'             => true,
            'no_php4_constructor'                         => true,
            'no_short_bool_cast'                          => true,
            'no_singleline_whitespace_before_semicolons'  => true,
            'no_spaces_after_function_name'               => true,
            'no_spaces_around_offset'                     => ['positions' => ['inside', 'outside']],
            'no_spaces_inside_parenthesis'                => true,
            'no_superfluous_elseif'                       => true,
            'no_superfluous_phpdoc_tags'                  => [
                'allow_mixed'         => true,
                'allow_unused_params' => true,
                'remove_inheritdoc'   => false,
            ],
            'no_trailing_comma_in_list_call'        => true,
            'no_trailing_comma_in_singleline_array' => true,
            'no_trailing_whitespace'                => true,
            'no_trailing_whitespace_in_comment'     => true,
            'no_trailing_whitespace_in_string'      => true,
            'no_unneeded_control_parentheses'       => [
                'statements' => [
                    'break',
                    'clone',
                    'continue',
                    'echo_print',
                    'return',
                    'switch_case',
                    'yield',
                ],
            ],
            'no_unneeded_curly_braces'                         => ['namespaces' => true],
            'no_unneeded_final_method'                         => ['private_methods' => true],
            'no_unreachable_default_argument_value'            => true,
            'no_unset_cast'                                    => true,
            'no_unset_on_property'                             => false,
            'no_unused_imports'                                => true,
            'no_useless_else'                                  => true,
            'no_useless_return'                                => true,
            'no_useless_sprintf'                               => true,
            'no_whitespace_before_comma_in_array'              => ['after_heredoc' => true],
            'no_whitespace_in_blank_line'                      => true,
            'non_printable_character'                          => ['use_escape_sequences_in_strings' => true],
            'normalize_index_brace'                            => true,
            'not_operator_with_space'                          => false,
            'not_operator_with_successor_space'                => true,
            'nullable_type_declaration_for_default_null_value' => ['use_nullable_type_declaration' => true],
            'object_operator_without_whitespace'               => true,
            'operator_linebreak'                               => ['only_booleans' => true, 'position' => 'beginning'],
            'ordered_class_elements'                           => false,
            'ordered_imports'                                  => [
                'sort_algorithm' => 'alpha',
                'imports_order'  => ['class', 'function', 'const'],
            ],
            'ordered_interfaces' => false,
            'ordered_traits'     => false,
            'php_unit_construct' => [
                'assertions' => [
                    'assertSame',
                    'assertEquals',
                    'assertNotEquals',
                    'assertNotSame',
                ],
            ],
            'php_unit_dedicate_assert'               => ['target' => 'newest'],
            'php_unit_dedicate_assert_internal_type' => ['target' => 'newest'],
            'php_unit_expectation'                   => ['target' => 'newest'],
            'php_unit_fqcn_annotation'               => true,
            'php_unit_internal_class'                => ['types' => ['normal', 'final']],
            'php_unit_method_casing'                 => ['case' => 'camel_case'],
            'php_unit_mock'                          => ['target' => 'newest'],
            'php_unit_mock_short_will_return'        => true,
            'php_unit_namespaced'                    => ['target' => 'newest'],
            'php_unit_no_expectation_annotation'     => [
                'target'          => 'newest',
                'use_class_const' => true,
            ],
            'php_unit_set_up_tear_down_visibility' => true,
            'php_unit_size_class'                  => false,
            'php_unit_strict'                      => [
                'assertions' => [
                    'assertAttributeEquals',
                    'assertAttributeNotEquals',
                    'assertEquals',
                    'assertNotEquals',
                ],
            ],
            'php_unit_test_annotation'               => ['style' => 'prefix'],
            'php_unit_test_case_static_method_calls' => [
                'call_type' => 'this',
                'methods'   => [],
            ],
            'php_unit_test_class_requires_covers' => false,
            'phpdoc_add_missing_param_annotation' => ['only_untyped' => true],
            'phpdoc_align'                        => [
                'align' => 'vertical',
                'tags'  => [
                    'method',
                    'param',
                    'property',
                    'return',
                    'throws',
                    'type',
                    'var',
                ],
            ],
            'phpdoc_annotation_without_dot' => false,
            'phpdoc_indent'                 => true,
            'phpdoc_inline_tag_normalizer'  => [
                'tags' => [
                    'example',
                    'id',
                    'internal',
                    'inheritdoc',
                    'inheritdocs',
                    'link',
                    'source',
                    'toc',
                    'tutorial',
                ],
            ],
            'phpdoc_line_span' => [
                'const'    => 'multi',
                'method'   => 'multi',
                'property' => 'multi',
            ],
            'phpdoc_no_access'    => true,
            'phpdoc_no_alias_tag' => [
                'replacements' => [
                    'property-read'  => 'property',
                    'property-write' => 'property',
                    'type'           => 'var',
                    'link'           => 'see',
                ],
            ],
            'phpdoc_no_empty_return'       => false,
            'phpdoc_no_package'            => true,
            'phpdoc_no_useless_inheritdoc' => true,
            'phpdoc_order'                 => true,
            'phpdoc_order_by_value'        => [
                'annotations' => [
                    'author',
                    'covers',
                    'coversNothing',
                    'dataProvider',
                    'depends',
                    'group',
                    'internal',
                    'method',
                    'property',
                    'property-read',
                    'property-write',
                    'requires',
                    'throws',
                    'uses',
                ],
            ],
            'phpdoc_return_self_reference' => [
                'replacements' => [
                    'this'    => '$this',
                    '@this'   => '$this',
                    '$self'   => 'self',
                    '@self'   => 'self',
                    '$static' => 'static',
                    '@static' => 'static',
                ],
            ],
            'phpdoc_scalar' => [
                'types' => [
                    'boolean',
                    'callback',
                    'double',
                    'integer',
                    'real',
                    'str',
                ],
            ],
            'phpdoc_separation'                             => true,
            'phpdoc_single_line_var_spacing'                => true,
            'phpdoc_summary'                                => false,
            'phpdoc_tag_casing'                             => ['tags' => ['inheritDoc']],
            'phpdoc_tag_type'                               => ['tags' => ['inheritDoc' => 'inline']],
            'phpdoc_to_comment'                             => false,
            'phpdoc_to_param_type'                          => false,
            'phpdoc_to_property_type'                       => false,
            'phpdoc_to_return_type'                         => false,
            'phpdoc_trim'                                   => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_types'                                  => ['groups' => ['simple', 'alias', 'meta']],
            'phpdoc_types_order'                            => [
                'null_adjustment' => 'always_last',
                'sort_algorithm'  => 'alpha',
            ],
            'phpdoc_var_annotation_correct_order' => true,
            'phpdoc_var_without_name'             => true,
            'pow_to_exponentiation'               => true,
            'protected_to_private'                => true,
            'psr_autoloading'                     => ['dir' => null],
            'random_api_migration'                => [
                'replacements' => [
                    'getrandmax' => 'mt_getrandmax',
                    'rand'       => 'mt_rand',
                    'srand'      => 'mt_srand',
                ],
            ],
            'regular_callable_call'              => true,
            'return_assignment'                  => true,
            'return_type_declaration'            => ['space_before' => 'none'],
            'self_accessor'                      => false,
            'self_static_accessor'               => true,
            'semicolon_after_instruction'        => false,
            'set_type_to_cast'                   => true,
            'short_scalar_cast'                  => true,
            'simple_to_complex_string_variable'  => true,
            'simplified_if_return'               => true,
            'simplified_null_return'             => false,
            'single_blank_line_at_eof'           => true,
            'single_blank_line_before_namespace' => true,
            'single_class_element_per_statement' => ['elements' => ['const', 'property']],
            'single_import_per_statement'        => true,
            'single_line_after_imports'          => true,
            'single_line_comment_style'          => ['comment_types' => ['asterisk', 'hash']],
            'single_line_throw'                  => false,
            'single_quote'                       => ['strings_containing_single_quote_chars' => false],
            'single_space_after_construct'       => [
                'constructs' => [
                    'abstract',
                    'as',
                    'attribute',
                    'break',
                    'case',
                    'catch',
                    'class',
                    'clone',
                    'comment',
                    'const',
                    'const_import',
                    'continue',
                    'do',
                    'echo',
                    'else',
                    'elseif',
                    'extends',
                    'final',
                    'finally',
                    'for',
                    'foreach',
                    'function',
                    'function_import',
                    'global',
                    'goto',
                    'if',
                    'implements',
                    'include',
                    'include_once',
                    'instanceof',
                    'insteadof',
                    'interface',
                    'match',
                    'named_argument',
                    'new',
                    'open_tag_with_echo',
                    'php_doc',
                    'php_open',
                    'print',
                    'private',
                    'protected',
                    'public',
                    'require',
                    'require_once',
                    'return',
                    'static',
                    'throw',
                    'trait',
                    'try',
                    'use',
                    'use_lambda',
                    'use_trait',
                    'var',
                    'while',
                    'yield',
                    'yield_from',
                ],
            ],
            'single_trait_insert_per_statement' => true,
            'space_after_semicolon'             => ['remove_in_empty_for_expressions' => true],
            'standardize_increment'             => true,
            'standardize_not_equals'            => true,
            'static_lambda'                     => true,
            'strict_comparison'                 => true,
            'strict_param'                      => true,
            'string_line_ending'                => true,
            'switch_case_semicolon_to_colon'    => true,
            'switch_case_space'                 => true,
            'switch_continue_to_break'          => true,
            'ternary_operator_spaces'           => true,
            'ternary_to_elvis_operator'         => true,
            'ternary_to_null_coalescing'        => true,
            'trailing_comma_in_multiline'       => [
                'after_heredoc' => true,
                'elements'      => ['arrays'],
            ],
            'trim_array_spaces'               => true,
            'unary_operator_spaces'           => true,
            'use_arrow_functions'             => false, // requires PHP7.4+
            'visibility_required'             => ['elements' => ['const', 'method', 'property']],
            'void_return'                     => false, // changes method signature
            'whitespace_after_comma_in_array' => true,
            'yoda_style'                      => [
                'equal'                => false,
                'identical'            => null,
                'less_and_greater'     => false,
                'always_move_variable' => false,
            ],
        ];

        $this->requiredPHPVersion = 70300;

        $this->autoActivateIsRiskyAllowed = true;
    }
}