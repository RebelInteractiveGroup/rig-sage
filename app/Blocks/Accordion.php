<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Accordion extends Block
{
    /**
     * The block id.
     *
     * @var string
     */
    public $id = '';

    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Accordion';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Accordion block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'auto';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [
        [
            'name' => 'no-parent',
            'label' => 'Independent Accordions',
            'description' => 'Each Accordion can be independently open or closed.',
            'isDefault' => true,
        ],
        [
            'name' => 'with-parent',
            'label' => 'Linked Accordions',
            'description' => 'Only one Accordion can be open or closed.',
        ]
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $accordion = [
        'items' => [
            [
                'header' => 'Item one',
                'background' => 'bright-orange',
                'content' => 'Content one',
                'link' => [
                    'title' => 'Link',
                    'url' => 'https://example.com',
                    'target' => '_blank',
                ]
            ],
            [
                'header' => 'Item two',
                'background' => 'light-blue',
                'content' => 'Content two',
                'link' => [
                    'title' => 'Link',
                    'url' => 'https://example.com',
                    'target' => '_blank',
                ]
            ],
            [
                'header' => 'Item three',
                'background' => 'charcoal',
                'content' => 'Content three',
                'link' => [
                    'title' => 'Link',
                    'url' => 'https://example.com',
                    'target' => '_blank',
                ]
            ],
        ],
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'items' => $this->items(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $accordion = new FieldsBuilder('accordion');

        $accordion
            ->addRepeater('items', [
                'layout' => 'block',
            ])
            ->addText('header')
            ->addSelect('background', [
                'choices' => [
                    'bright-orange' => 'Orange',
                    'light-blue' => 'Light Blue',
                    'charcoal' => 'Charcoal',
                ],
            ])
            ->addLink('link')
            ->addWysiwyg('content')
            ->endRepeater();

        return $accordion->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function items()
    {
        $this->id = uniqid('accordion-');
        return get_field('items') ?: $this->accordion['items'];
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
