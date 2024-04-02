<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Hero extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Hero';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A hero block.';

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
    public $mode = 'preview';

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

    public $styles = [
      [
          'name' => 'light',
          'label' => 'Light',
          'isDefault' => true,
      ],
      [
          'name' => 'dark',
          'label' => 'Dark',
      ]
    ];

  /**
   * Data to be passed to the block before rendering.
   *
   * @return array
   */
    public function with()
    {
        return [
            'hero' => $this->hero(),
        ];
    }

  /**
   * The block field group.
   *
   * @return array
   */
    public function fields()
    {
        $hero = new FieldsBuilder('hero');

        $hero
              ->addSelect('background_type', [
                  'label' => 'Background Type',
                  'choices' => [
                      'image' => 'Image',
                      'video' => 'Video',
                      'color' => 'Use Background Color',
                  ],
                  'default_value' => 'image',
              ])
              ->addImage('background_image', [
                  'label' => 'Background Image',
                  'conditional_logic' => [
                      [
                          [
                              'field' => 'background_type',
                              'operator' => '==',
                              'value' => 'image',
                          ],
                      ],
                  ],
                  ])
              ->addFile('background_video', [
                  'label' => 'Background Video',
                  'conditional_logic' => [
                      [
                          [
                              'field' => 'background_type',
                              'operator' => '==',
                              'value' => 'video',
                          ],
                      ],
                  ],
                  ])
              ->addText('heading')
              ->addTrueFalse('small_subheading', [
                  'label' => 'Use Small Subheading',
                  'default_value' => 0,
              ])
              ->addText('subheading')
              ->addLink('button');


        return $hero->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function hero()
    {
        $hero['background_type'] = get_field('background_type');
        $hero['background_image'] = get_field('background_image');
        $hero['background_video'] = get_field('background_video');
        $hero['heading'] = get_field('heading');
        $hero['subheading'] = get_field('subheading');
        $hero['small_subheading'] = get_field('small_subheading');
        $hero['button'] = get_field('button');
        return $hero;
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