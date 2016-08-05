# vl-tabs
vl-tabs is a Wordpress based Plugin that provides a pure CSS tabbing.

* Contributors:		   visionlike
* Requires at least: 3.0
* Tested up to:        4.5.3
* Stable tag:           1.0
* License:               GPLv2 or later
* License URI:         http://www.gnu.org/licenses/gpl-2.0.html

# Installation #
* If you don’t know how to install a plugin for WordPress, [here’s how](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

# Use #

The Settings Page can be found here: WP-Admin -> Themes -> VisionLike - CSS Tabs

Make your settings and use the Shortcode.

## Shortcodes ##

### Full Shortcode Example ###
```
[tabbing width="700" ani="fadeIn"]
[tab name="Testing #01" check="1"]Content #01[/tab]
[tab name="Testing #02"]Content #02[/tab]
[/tabbing]
```

### The [tabbing] Attributes ###
* width  / the full width of tabs / optional
* ani  / the animation type / optional

### The [tab] Attributes ###
* name  / name of the tab link
* check  / the activ tab on load / optional

# Your Own Style #

style.css (Example for your own style.css)

```
.tabbing { background:#F6F6F6; width: 100%; margin-bottom:30px; border:#DDD 1px solid; overflow:hidden; }

.tabbing li.litab label.labeltab { border-right:#DDD 1px solid; text-align:center; }
.tabbing li.litab label.labeltab:hover { background: #E2007A; color:#fff !important; }
.tabbing li.litab [id^=tab]:checked + label { background: #97BF0D; color:#fff !important; font-weight:bold; }

.tabbing li.litab .tab-content { background:#fff; }
```
