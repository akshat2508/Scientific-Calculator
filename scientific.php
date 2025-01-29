<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>scientific</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="output">
                <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST")
                    {
                        if(isset($_POST["operator"]))
                        {
                            $operator = $_POST["operator"];
                            $num1 = $_POST["num1"];
                            $num2 = $_POST["num2"];
                        }

                        switch($operator)
                        {
                            case('sin'):
                                echo sin(deg2rad($num1));
                                break;
                            case('cos'):
                                echo cos(deg2rad($num1));
                                break;
                            case('tan'):
                                echo tan(deg2rad($num1));
                            case('log'):
                                echo ($num1>0)?log10($num1):"Error: Log of non positive integer";
                                break;
                            case('!');
                                 if($num1<0)
                                 {
                                    echo "Error: Factorial of non postiive integer";
                                 }
                                 else
                                 {
                                    $fact = 1;
                                    for( $i = 0 ; $i < $num1 ; $i++)
                                    {
                                        $fact *= $i;
                                    }
                                    echo $fact;
                                 }
                            case('+'):
                                echo $num1+$num2;
                                break;
                            case('-'):
                                echo $num1-$num2;
                                break;
                            case('/'):
                                echo $num1/$num2;
                                break;
                            case('x'):
                                echo $num1*$num2;
                                break;
                            case('%'):
                                echo $num1%$num2;
                                break;
                            case('^'):
                                echo pow($num1,$num2);
                                break;
                            case('CE'):
                                echo 0;
                                break;
        
                        }
                    }
                ?>

            </div>

            <div class="inputcontainer">
                <form action="" method="POST">
                    <label for="num1"><h3>Enter the first number</h3></label>
                    <input type="number" id="num1" name="num1" placeholder="enter the Ist number" class="input" required>

                    <label for="num2"><h3>Enter the second number</h3></label>
                    <input type="number" id="num2" name="num2" placeholder="enter the 2nd number" class="input" required>

                <div class="buttoncontainer">
                        <input type="submit" value="sin" name="operator"  class="button" onclick="toggleinput('sin')">
                        <input type="submit" value="cos" name="operator"  class="button" onclick="toggleinput('cos')">
                        <input type="submit" value="tan" name="operator"  class="button" onclick="toggleinput('tan')">
                        <input type="submit" value="+" name="operator"  class="button" onclick="toggleinput('+')">
                        <input type="submit" value="-" name="operator"  class="button" onclick="toggleinput('-')">
                        <input type="submit" value="x" name="operator"  class="button" onclick="toggleinput('x')">
                        <input type="submit" value="/" name="operator"  class="button" onclick="toggleinput('/')">
                        <input type="submit" value="log" name="operator"  class="button" onclick="toggleinput('log')">
                        <input type="submit" value="^" name="operator"  class="button" onclick="toggleinput('^')">
                        <input type="submit" value="%" name="operator"  class="button" onclick="toggleinput('%')">
                        <input type="submit" value="!" name="operator"  class="button" onclick="toggleinput('!')">
                        <input type="submit" value="CE" name="operator"  class="button" onclick="toggleinput('CE')">
                </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        function toggleinput(operator)
        {
            let num1 = document.getElementById("num1");
            let num2  = document.getElementById("num2");
            let singleinputOps = ['sin' ,'cos','log','tan','!'];

            if(operator ==="CE"){
                num1.removeAttribute("required");
                num2.removeAttribute("required");
                num1.value="";
                num2.value ="";
            }
            else if(singleinputOps.includes(operator))
            {
                num1.setAttribute("required" ,"true");
                num2.removeAttribute("required");
                num2.value ="";
            }
            else{
                num1.setAttribute("required", "true");
                num2.setAttribute("required","true");
            }
            
                
    
        }

    </script>
</body>

</html>