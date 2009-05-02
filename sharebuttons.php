<?php
/*
Plugin Name: ShareButtons 
Plugin URI: http://www.picturesurf.org/share-buttons
Description: Add sharing buttons to your blog posts for: Facebook, Digg, Twitter, Email, Reddit, StumbleUpon, etc.
			       Having large buttons for the top sharing sites results in a lot more sharing than a single-button that overwhelms users with lots of sharing options.
             You can always change what buttons you want to appear.
Version: 1.0.0
Author: AlanEdge, ysterbal
*/
/*
  Copyright 2008 Picturesurf.org

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
add_filter('the_content', 'add_sharebuttons', 99999);
function add_sharebuttons($content)
	{
		$tag_pattern = '/<div id="sharepost"/i';

		if(!preg_match($tag_pattern,$content)) // Make sure we dont intefere with the plugins
		{		
			// Check for an existing copy of the text in the post
			$title = the_title("","",false);
			$url = get_permalink();						
			
			$content .= __('<strong>Share this Post</strong><small><a alt="" href="http://www.picturesurf.org/share-buttons/">[?]</a></small>');
			$content .= __('<div id="sharepost" style="padding-top:10px;" ><a href="mailto:?subject=' . $title . '&amp;body=' . $url . '" target="_blank"><img src="http://www.picturesurf.org/img/shreml.png" alt="" /></a>&nbsp;&nbsp;');
			$content .= __('<a href="http://www.facebook.com/share.php?u=' . $url . '" target="_blank"><img src="http://www.picturesurf.org/img/shrfb.png" alt="" /></a>&nbsp;&nbsp;');
			$content .= __('<a href="http://twitter.com/home?status=' . $url . ' target="_blank"><img src="http://www.picturesurf.org/img/shrtwr.png" alt="" /></a>&nbsp;&nbsp;');
			$content .= __('<a href="http://digg.com/submit?url=' . $url . '&amp;title=' . $title . '&amp;bodytext=&amp;media=&amp;topic=" target="_blank"><img src="http://www.picturesurf.org/img/shrdig.png" alt="" /></a>&nbsp;&nbsp;');
		  $content .= __('<a href="http://delicious.com/save?v=5&amp;noui&amp;jump=close&amp;url=' . $url . '&amp;title=' . $title .'" target="_blank"><img src="http://www.picturesurf.org/img/shrdel.png" alt="" /></a></div>');
		  
    }
    
    return $content;
	}		
?>
