 var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        var video = document.getElementById('video360edit');
        output.innerHTML = slider.value;
        slider.max = 200;
        slider.oninput = function() {
            output.innerHTML = this.value;
            video.currentTime = this.value;
        }

        $('input[type="file"]').imageuploadify();
            myResizeWindow();
            window.addEventListener("resize", myResizeWindow);
            function myResizeWindow(){
                var height =  $('#noselect').height() - 50;
                console.log(height);
                $('.hotspot-list-box').css({
                    'height' : height
                });
            }
        var i = 0;
        
        function insertTable() {
            var table = document.getElementById("board");
            var row = table.insertRow(1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            i++;
            cell1.innerHTML = '<i class="icon-hotspot-number ">1</i>';
            cell2.innerHTML = slider.value;
            cell3.innerHTML = '0.0';
            cell4.innerHTML = '2.0';
            cell5.innerHTML = '<button type="button" style="font-size:24px" class="delete-btn " onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>';
            updateIndext();
            insertHotSpottoMap();
        }

        function insertHotSpottoMap() {
            var mainMap = document.getElementById("noselect");
            var div = document.createElement('div');
            var numchild = mainMap.childElementCount - 1;

            div.className = "hotspot";
            div.id = "hotspot" + numchild;
            div.innerHTML = '<i class="icon-hotspot-number" id="hotspot-' + numchild + '"' + '>' + numchild + '</i>';
            mainMap.appendChild(div);

            $(".hotspot").draggable({
                cursor: 'move',
                tolerance: 'fit',
                restrict: {
                    restriction: 'parent',
                    elementRect: {
                        top: 0,
                        left: 0,
                        bottom: 1,
                        right: 1
                    }
                },

            });
            $(".noselect").droppable({
                accept: '.hotspot',
                activeClass: "drop-area"
            });

        }

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("board").deleteRow(i);
            //$('#hotspot' + i).remove();
            var index = i+1;
            $('#noselect').children().eq(index).remove();
            //updateIndext();
        }

        function updateIndext() {
            $("tr").each(function(index) { // traverse through all the rows
                if (index != 0) { // if the row is not the heading one
                    $(this).find("td:first").html('<i class="icon-hotspot-number ">' + index + '</i>'); // set the index number in the first 'td' of the row

                }
            });
            var mainMap = document.getElementById("noselect");
            var numchild = mainMap.childElementCount;
            $("#noneselect").each(function(i) { // traverse through all the rows
                if (i != 0) { // if the row is not the heading one
                    $(this).find("div:first").html('<i class="icon-hotspot-number ">' + i + '</i>'); // set the index number in the first 'td' of the row

                }
            });


        }