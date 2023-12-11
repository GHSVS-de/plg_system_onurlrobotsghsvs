# plg_system_onurlrobotsghsvs (OnUrlRobotsGhsvs)

Joomla system plugin. Sets a robots tag in frontend if the `option` part of the Joomla url matches your configuration.

## English description
Joomla works internally with urls of the type `index.php?option=com_foo&view=bar&task=fritz`, where `option=com_foo` in the query string means that the component Foo is addressed.

Even if Joomla then displays a nice, human-readable link in the browser, such a url is behind it.

This plugin does nothing more than examine this url and compare the `option` part with the settings you have made in the plugin settings. If, for example, `option=com_foo` is found, the plugin inserts a `robots` tag into the page. For example:

`<meta name="robots" content="noindex,nofollow">`

This works as desired in 99% of cases. The plugin is occasionally powerless against stubborn extensions and template frameworks ;-)

## Deutsche Beschreibung
Joomla arbeitet intern mit Urls der Art `index.php?option=com_foo&view=bar&task=fritz`, wobei hier `option=com_foo` sagt, dass die Komponente Foo angesprochen wird.

Selbst wenn Joomla im Browser dann einen hübschen, menschenlesbaren Link anzeigt, steckt dahinter solch eine Url.

Dieses Plugin macht nicht mehr, als diese Url zu untersuchen und den `option`-Teil mit denen von Ihren gemachten Einstellungen in den Plugineinstellungen abzugleichen. Wird z.B. `option=com_foo` gefunden, setzt das Plugin einen `robots`-Tag in die Seite ein. Beispielsweise:

`<meta name="robots" content="noindex,nofollow">`

Auch den `content`-Teil können Sie selbst kongigurieren.

Das gelingt wunschgemäß in 99% der Fälle. Gegen störrische Erweiterungen und Template-Frameworks ist das Plugin gelegentlich machtlos ;-)

----------------------

# My personal build procedure (WSL 1 or 2, Debian, Win 10)
- Prepare/adapt `./package.json`.
- `cd /mnt/z/git-kram/plg_system_onurlrobotsghsvs`

## node/npm updates/installation
- `npm run updateCheck` or (faster) `npm outdated`
- `npm run update` (if needed) or (faster) `npm update --save-dev`
- `npm install` (if needed)

## Build installable ZIP package
- `node build.js`
- New, installable ZIP is in `./dist` afterwards.
- All packed files for this ZIP can be seen in `./package`. **But only if you disable deletion of this folder at the end of `build.js`**.s

#### For Joomla update server
- Use/See `dist/release.txt` as basic release text.
- Create new release with new tag.
- See extracts(!) of the update and changelog XML for update and changelog servers are in `./dist` as well. Check for necessary additions! Then copy/paste.
