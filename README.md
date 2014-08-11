## Wistia Embed Shortcode Plugin for Wordpress

This plugin makes use of Wistia's [javascript player API](http://wistia.com/doc/player-api) to allow you to use a simple shortcode to embed your videos and customize settings (currently supports color, width/height, and autoplay). It only gives you a few of the available embed options at this point (because that was all I needed), but send me a message if you are looking for other customizations.  It would not be difficult to implement any of the other [available embed options](http://wistia.com/doc/embed-options) or [embed plugins](http://wistia.com/doc/embed-options#embed_plugins) that Wistia provides.

## Install
- Download the .zip of this repository.
- Add to Wordpress plugins via dashboard plugin installer or unzip and place in plugins folder manually
- Activate it on plugins page 

You can then use a simple shortcode to embed your Wistia videos and track logged in users that watch them.  The only required shortcode attribute is the media id from the Wistia video you want to embed.

## Usage

First, find the ID of the video you's like to embed. Go to your Wistia dashboard and select a video.  The id will be at the end of the URL of that page.

For example: https://YOUR-ACCOUNT.wistia.com/medias/**g5pnf59ala**

Just grab the "**g5pnf59ala**" and use that as the "id" in the shortcode like this:

```
[wistia_embed  id="g5pnf59ala"]
```

Note that the id is a required value (and the one used above is a test video provided by Wistia).  The shortcode will not work without the id defined.

#### Currently available settings and their default values:

```
[wistia_embed  id="" color="7b796a" width="640" height="360" autoplay="false"  ]
```

If you don't explicitly define the extra options above in your shortcode, the default values will be used.  In other words, if you only declare your video id like so:

```
[wistia_embed  id="g5pnf59ala"]
```

the shortcode will use the default values for the other settings - which would be the equivilent of writing:

```
[wistia_embed id="g5pnf59ala" color="7b796a" width="640" height="360" autoplay="false"]
```

If all you want to change is the player color, you would simply use your video id and a hex color value like this:

```
[wistia_embed id="g5pnf59ala" color="5C82A3"]
```

Any attribute you choose to set will overwrite the default. An example shortcode using all of the attributes with your own custom values would look something like this:

```
[wistia_embed id="YOUR_VIDEO_ID" color="5C82A3" width="1280" height="720" autoplay="true"]
```

## User Tracking

If you are using Wordpress as a membership site and a user is logged in, their registered email will be used to track the videos they play.  You will then be able to look up their email in the User Stream in your Wistia stats dashboard and see their entire history of viewing behavior (getting more accurate user stats is the entire reason I wrote this plugin in the first place).

