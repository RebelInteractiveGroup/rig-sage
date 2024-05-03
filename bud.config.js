/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/sage/docs sage documentation}
 * @see {@link https://bud.js.org/learn/config bud.js configuration guide}
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app) => {
  /**
   * Application assets & entrypoints
   *
   * @see {@link https://bud.js.org/reference/bud.entry}
   * @see {@link https://bud.js.org/reference/bud.assets}
   */
  app
    .entry('app', ['@scripts/app', '@styles/app'])
    .assets(['images']);
  /**
   * Set public path
   *
   * @see {@link https://bud.js.org/reference/bud.setPublicPath}
   */
  app.setPublicPath('/app/themes/sage/public/');

  /**
   * Development server settings
   *
   * @see {@link https://bud.js.org/reference/bud.setUrl}
   * @see {@link https://bud.js.org/reference/bud.setProxyUrl}
   * @see {@link https://bud.js.org/reference/bud.watch}
   */
  app
    .setUrl('http://localhost:3000')
    .setProxyUrl('http://example.test')
    .watch(['resources/views', 'app']);

  /**
   * Generate WordPress `theme.json`
   *
   * @note This overwrites `theme.json` on every build.
   *
   * @see {@link https://bud.js.org/extensions/sage/theme.json}
   * @see {@link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json}
   */
  app.wpjson
    .setSettings({
      background: {
        backgroundImage: true,
      },
      color: {
        custom: false,
        customDuotone: false,
        customGradient: false,
        defaultDuotone: false,
        defaultGradients: false,
        defaultPalette: false,
        duotone: [],
        palette: [
          { 'name': 'turquoise', 'slug': 'turquoise', 'color': '#163A46' },
          { 'name': 'charcoal', 'slug': 'charcoal', 'color': '#54565B' },
          { 'name': 'bright-orange', 'slug': 'bright-orange', 'color': '#CB3B00' },
          { 'name': 'light-orange', 'slug': 'light-orange', 'color': '#171717' },
          { 'name': 'light-blue', 'slug': 'light-blue', 'color': '#50758A' },
          { 'name': 'light-green', 'slug': 'light-green', 'color': '#508A80' },
          { 'name': 'blue-gray', 'slug': 'blue-gray', 'color': '#DCE3E8' },
          { 'name': 'white', 'slug': 'white', 'color': '#FFFFFF' },
          { 'name': 'black', 'slug': 'black', 'color': '#171717' },
        ]
      },
      custom: {
        spacing: {},
        typography: {
          'font-size': {},
          'line-height': {},
          'font-families': [{
            "name": "Primary",
            "slug": "primary",
            "fontFamily": "RedditMono",
            "fontFace": [
                {
                    "fontFamily": "RedditMono",
                    "fontWeight": "400",
                    "fontStyle": "normal",
                    "fontStretch": "normal",
                    "src": ["file:./resources/fonts/RedditMono-VariableFont_wght.ttf"]
                }
            ]
        }]
        },
      },
      spacing: {
        padding: true,
        units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
      },
      typography: {
        customFontSize: false,
      },
    })
};
