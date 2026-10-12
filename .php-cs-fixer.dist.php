<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = Finder::create()
    ->in(__DIR__)
    ->exclude(['.github', 'logs', 'vendor'])
    ->name('*.php');

return (new Config())
    ->setRiskyAllowed(true)
    ->setRules([
        //ruleset
        '@PSR12' => true,
        //alias
        'array_push' => true,
        'backtick_to_shell_exec' => true,
        'ereg_to_preg' => true,
        'modernize_strpos' => [
            'modernize_stripos' => true
        ],
        'no_alias_functions' => [
            'sets' => ['@all']
        ],
        'no_alias_language_construct_call' => true,
        'no_mixed_echo_print' => [
            'use' => 'echo'
        ],
        'pow_to_exponentiation' => true,
        'random_api_migration' => [
            'replacements' => [
                'mt_getrandmax' => 'getrandmax',
                'mt_rand' => 'random_int',
                'mt_srand' => 'srand',
                'rand' => 'random_int'
            ]
        ],
        'set_type_to_cast' => true,
        //array_notation
        'array_syntax' => [
            'syntax' => 'short'
        ],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_trailing_comma_in_singleline' => true,
        'no_whitespace_before_comma_in_array' => true,
        'normalize_index_brace' => true,
        'return_to_yield_from' => true,
        'trim_array_spaces' => true,
        'whitespace_after_comma_in_array' => [
            'ensure_single_space' => true
        ],
        'yield_from_array_to_yields' => true,
        //basic
        'encoding' => true,
        'no_multiple_statements_per_line' => true,
        'numeric_literal_separator' => [
            'strategy' => 'use_separator',
            'override_existing' => true
        ],
        'octal_notation' => true,
        //casing
        'class_reference_name_casing' => true,
        'constant_case' => [
            'case' => 'lower'
        ],
        'integer_literal_case' => true,
        'lowercase_keywords' => true,
        'lowercase_static_reference' => true,
        'magic_constant_casing' => true,
        'magic_method_casing' => true,
        'native_function_casing' => true,
        'native_type_declaration_casing' => true,
        //cast_notation
        'cast_spaces' => [
            'space' => 'single'
        ],
        'lowercase_cast' => true,
        'modernize_types_casting' => true,
        'no_short_bool_cast' => true,
        'no_unset_cast' => true,
        'short_scalar_cast' => true,
        //class_notation
        'class_attributes_separation' => [
            'elements' => [
                'const' => 'one',
                'method' => 'one',
                'property' => 'one',
                'trait_import' => 'one',
            ],
        ],
        'modern_serialization_methods' => true,
        'no_null_property_initialization' => true,
        'no_redundant_readonly_property' => true,
        'no_unneeded_final_method' => [
            'private_methods' => true
        ],
        'ordered_class_elements' => [
            'case_sensitive' => true,
            'order' => [
                'use_trait',
                'case',
                'constant_private',
                'constant_protected',
                'constant_public',
                'property_private',
                'property_protected',
                'property_public',
                'construct',
                'destruct',
                'magic',
                'phpunit',
                'method_private',
                'method_protected',
                'method_public'
            ],
            'sort_algorithm' => 'alpha'
        ],
        'self_accessor' => true,
        'single_trait_insert_per_statement' => false,
        'static_private_method' => false,
        //class_usage
        'date_time_immutable' => true,
        //constant_notation
        'native_constant_invocation' => [
            'fix_built_in' => true
        ],
        'native_function_invocation' => [
            'include' => ['@all'],
            'scope' => 'namespaced', // Menambahkan backslash hanya jika berada di dalam namespace
            'strict' => true, // Menerapkan ke semua fungsi bawaan PHP
        ],
        //control_structure
        'control_structure_braces' => true,
        'elseif' => true,
        'empty_loop_body' => [
            'style' => 'braces'
        ],
        'empty_loop_condition' => [
            'style' => 'while'
        ],
        'include' => true,
        'no_superfluous_elseif' => true,
        'no_unneeded_braces' => true,
        'no_unneeded_control_parentheses' => [
            'statements' => [
                'break',
                'clone',
                'continue',
                'echo_print',
                'negative_instanceof',
                'others',
                'return',
                'switch_case',
                'yield',
                'yield_from'
            ]
        ],
        'no_useless_else' => true,
        'simplified_if_return' => true,
        'switch_case_semicolon_to_colon' => true,
        'switch_case_space' => true,
        'switch_continue_to_break' => true,
        //function_notation
        'combine_nested_dirname' => true,
        'fopen_flag_order' => true,
        'function_declaration' => [
            'closure_function_spacing' => 'one',
            'closure_fn_spacing' => 'none'
        ],
        'single_line_empty_body' => false,
        'implode_call' => true,
        'method_argument_space' => [
            'keep_multiple_spaces_after_comma' => false,
            'on_multiline' => 'ensure_fully_multiline'
        ],
        'no_spaces_after_function_name' => true,
        'no_useless_printf' => true,
        'no_useless_sprintf' => true,
        'regular_callable_call' => true,
        'return_type_declaration' => [
            'space_before' => 'none'
        ],
        'use_arrow_functions' => true,
        'void_return' => [
            'fix_lambda' => true
        ],
        //import
        'no_unused_imports' => true,
        'no_unneeded_import_alias' => true,
        'ordered_imports' => [
            'case_sensitive' => true,
            'imports_order' => ['class', 'function', 'const']
        ],
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => false,
            'import_functions' => false,
        ],
        'fully_qualified_strict_types' => ['import_symbols' => true],
        'single_import_per_statement' => [
            'group_to_single_imports' => false
        ],
        'single_line_after_imports' => true,
        //langauge_construct
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'declare_equal_normalize' => ['space' => 'none'],
        'declare_parentheses' => true,
        'dir_constant' => true,
        'explicit_indirect_variable' => true,
        'function_to_constant' => [
            'functions' => [
                'get_called_class',
                'get_class',
                'get_class_this',
                'php_sapi_name',
                'phpversion',
                'pi'
            ]
        ],
        'get_class_to_class_keyword' => true,
        'is_null' => true,
        'no_unset_on_property' => true,
        'nullable_type_declaration' => [
            'syntax' => 'question_mark'
        ],
        'single_space_around_construct' => [
            'constructs_followed_by_a_single_space' => [
                'abstract',
                'as',
                'case',
                'catch',
                'class',
                'const_import',
                'do',
                'else',
                'elseif',
                'final',
                'finally',
                'for',
                'foreach',
                'function',
                'function_import',
                'if',
                'insteadof',
                'interface',
                'namespace',
                'new',
                'private',
                'protected',
                'public',
                'static',
                'switch',
                'trait',
                'try',
                'use',
                'use_lambda',
                'while'
            ],
            'constructs_preceded_by_a_single_space' => [
                'as',
                'else',
                'elseif',
                'use_lambda'
            ]
        ],
        //list_notation
        'list_syntax' => [
            'syntax' => 'short'
        ],
        //namespace_notation
        'blank_line_after_namespace' => true,
        'blank_lines_before_namespace' => [
            'min_line_breaks' => 2,
            'max_line_breaks' => 2
        ],
        'clean_namespace' => true,
        'no_leading_namespace_whitespace' => true,
        //naming
        'no_homoglyph_names' => true,
        //operator
        'assign_null_coalescing_to_coalesce_equal' => true,
        'binary_operator_spaces' => [
            'default' => 'at_least_single_space'
        ],
        'concat_space' => [
            'spacing' => 'one'
        ],
        'increment_style' => [
            'style' => 'post'
        ],
        'logical_operators' => true,
        'long_to_shorthand_operator' => true,
        'new_with_parentheses' => [
            'anonymous_class' => true
        ],
        'no_space_around_double_colon' => true,
        'no_useless_concat_operator' => [
            'juggle_simple_strings' => true
        ],
        'no_useless_nullsafe_operator' => true,
        'object_operator_without_whitespace' => true,
        'operator_linebreak' => [
            'only_booleans' => true
        ],
        'standardize_increment' => true,
        'standardize_not_equals' => true,
        'ternary_operator_spaces' => true,
        'ternary_to_elvis_operator' => true,
        'ternary_to_null_coalescing' => true,
        'unary_operator_spaces' => [
            'only_dec_inc' => false
        ],
        //php_tag
        'blank_line_after_opening_tag' => true,
        'echo_tag_syntax' => [
            'format' => 'long',
            'long_function' => 'echo',
            'shorten_simple_statements_only' => false
        ],
        'full_opening_tag' => true,
        'linebreak_after_opening_tag' => true,
        'no_closing_tag' => true,
        //phpdoc
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_phpdoc' => true,
        'phpdoc_add_missing_param_annotation' => [
            'only_untyped' => true
        ],
        'phpdoc_annotation_without_dot' => true,
        'phpdoc_indent' => true,
        'phpdoc_no_duplicate_types' => true,
        'phpdoc_order' => [
            'order' => ['param', 'return', 'throws']
        ],
        'phpdoc_param_order' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_trim' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        //return_notation
        'no_useless_return' => true,
        'return_assignment' => true,
        //semicolon
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line'
        ],
        'no_empty_statement' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'semicolon_after_instruction' => true,
        'space_after_semicolon' => [
            'remove_in_empty_for_expressions' => true
        ],
        //strict
        'declare_strict_types' => [
            'strategy' => 'add_when_missing'
        ],
        'strict_comparison' => true,
        'strict_param' => true,
        //string_notation
        'explicit_string_variable' => true,
        'heredoc_to_nowdoc' => true,
        'multiline_string_to_heredoc' => true,
        'no_binary_string' => true,
        'simple_to_complex_string_variable' => true,
        'single_quote' => [
            'strings_containing_single_quote_chars' => false
        ],
        'string_length_to_empty' => true,
        'string_line_ending' => true,
        //whitespace
        'array_indentation' => true,
        'blank_line_before_statement' => false,
        'compact_nullable_type_declaration' => true,
        'indentation_type' => true,
        'line_ending' => true,
        'method_chaining_indentation' => true,
        'no_extra_blank_lines' => [
            'tokens' => [
                'break',
                'continue',
                'curly_brace_block',
                'parenthesis_brace_block',
                'return',
                'square_brace_block',
                'throw',
                'switch',
                'case',
                'default',
                'extra'
            ]
        ],
        'no_trailing_whitespace' => true,
        'no_whitespace_in_blank_line' => true,
        'single_blank_line_at_eof' => true,
        'spaces_inside_parentheses' => [
            'space' => 'none'
        ],
        'statement_indentation' => [
            'stick_comment_to_next_continuous_control_statement' => false
        ],
        'type_declaration_spaces' => [
            'elements' => ['function', 'property', 'constant']
        ],
        'types_spaces' => [
            'space' => 'single',
            'space_multiple_catch' => 'single'
        ],
        'align_multiline_comment' => true,
    ])
    ->setFinder($finder)
    ->setUsingCache(false)
    ->setParallelConfig(ParallelConfigFactory::sequential());
