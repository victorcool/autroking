<script>
        $('input[type="file"]').each(function(){
          // Refs
          var $file = $(this),
              $label = $file.next('label'),
              $labelText = $label.find('span'),
              labelDefault = $labelText.text();
          // When a new file is selected
          $file.on('change', function(event){
            var fileName = $file.val().split( '\\' ).pop(),
                tmppath = URL.createObjectURL(event.target.files[0]);
            //Check successfully selection
            if( fileName ){
              $label
                .addClass('file-ok')
                .css('background-image', 'url(' + tmppath + ')');
              $labelText.text(fileName);
            }else{
              $label.removeClass('file-ok');
              $labelText.text(labelDefault);
            }
          });
        
        // End loop of file input elements
        });
        </script>
        <script type="text/javascript">
        
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-36251023-1']);
          _gaq.push(['_setDomainName', 'jqueryscript.net']);
          _gaq.push(['_trackPageview']);
        
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        
        </script>