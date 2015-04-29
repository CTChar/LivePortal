  jwplayer("container").setup({
    playlist: [{
      image: "<?php echo getAvatar(getUsername($user0),563); ?>", 
	  file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user0)); ?>", 
	  title: "<?php echo getUsername($user0); ?>", 
    },{
      image: "<?php echo getAvatar(getUsername($user1),563); ?>", 
	  file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user1)); ?>", 
	  title: "<?php echo getUsername($user1); ?>"
    },{
      image: "<?php echo getAvatar(getUsername($user2),563); ?>", 
	  file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user2)); ?>", 
	  title: "<?php echo getUsername($user2); ?>"
    },{
      image: "<?php echo getAvatar(getUsername($user3),563); ?>", 
	  file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user3)); ?>", 
	  title: "<?php echo getUsername($user3); ?>"
    }],

    width: "100%",
      aspectratio: "16:9",
    listbar: {
      position: 'right',
      size: 260
    },
  });