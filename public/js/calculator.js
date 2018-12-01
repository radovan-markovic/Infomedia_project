    const tbl = document.getElementById("tbl");

		//Draw table with for loop
		for (var j = 1; j < 11; j++) {
		
			let thead = tbl.appendChild(document.createElement("thead"));
			let thRow = thead.appendChild(document.createElement("tr"));
			thRow.className = "is-bordered";
			
			 thRow.appendChild(document.createElement("td")).innerText = j;
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 1";
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 2";
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 3";
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 4";
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 5";
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 6";
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 7";
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 8";
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 9";
			 thRow.appendChild(document.createElement("td")).innerText = j + " x 10";
		
		}	

		 //Get value from the table
		 if (tbl != null) {

			for (var i = 1; i < tbl.rows.length; i++) {

				for (var j = 1; j < tbl.rows[i].cells.length; j++)

					tbl.rows[i].cells[j].onclick = function () { getValue(this); };

			}

        }
		
		//Get value off cell
		function getValue(cel) {

            let str = cel.innerHTML.trim();
            let factor1;
            let factor2;
            //check numbers with two decimals
            if (str.length === 6){               
                factor1 = (str.charAt(0) + str.charAt(1)).trim();
                factor2 = (str.charAt(4) + str.charAt(5)).trim(); 
            }
            //Check numbers with two decimals
            else if (str.length === 7) {
                factor1 = (str.charAt(0) + str.charAt(1));
                factor2 = (str.charAt(5) + str.charAt(6));
            }
            //numbers with one decimal
            else {
                factor1 = str.charAt(0);
			    factor2 = str.charAt(4);
            }
			
			calculateValue(factor1, factor2);
		}
		
		//Send data trough ajax call to calculate the value
		function calculateValue(factor1, factor2){

			$(document).ready(function(){
		
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			   
			    $.ajax({
					url: './classes/calculator.class.php',
					type: 'POST',             
					data: {
						_token: CSRF_TOKEN,
						class: 'Calculator',function:'multiply',
						factor1: factor1,
						factor2: factor2,
					},
					dataType: 'JSON',               
					success: function(data) {
						//Check is there result to show
						if(data){
							let success = `<div class="notification is-success">Result ${data.result} saved!</div>`;
                        	document.getElementById("first_section").insertAdjacentHTML('afterbegin', success);                
							$("#result").val(data.result);
							
							setTimeout(function(){
								$('.notification').remove();
							  }, 500)
						}
						else{
							alert('Not saved!');
						}  
                        
					}
				}); 
			
			});	
		}
	