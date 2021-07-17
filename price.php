<!DOCTYPE html>
<html lang="en">
<head>
 
</head>

<!-- <body id="home" data-spy="scroll" data-target=".navbar-collapse"> -->
<body>


<form action="#" method="post" id="pizzaForm" class="demoForm">

    <fieldset>
        <legend>Demo: Select Lists Onchange</legend>
        
        <p>Select Pizza Size and Toppings</p>
        
        <p>
            <select name="size" id="size">
                <option value="5">Small: $5</option>
                <option value="8" selected="selected">Medium: $8</option>
                <option value="12">Large: $12</option>
            </select>
            
            <select name="toppings[]" id="toppings" multiple="multiple" size="5">
                <option value=".40">Mushrooms</option>
                <option value=".30">Onions</option>
                <option value=".40">Black Olives</option>
                <option value=".50">Sausage</option>
                <option value=".50">Pepperoni</option>
            </select>
            <input type="hidden" name="toppings_tot" value="0" />
         
            <label>Total: $<input type="text" class="num" name="total" value="8.00" readonly="readonly" /></label>
        </p>
        
    </fieldset>
    
</form>
</body>
<script>// functions assigned to onchange properties
document.getElementById('size').onchange = function() {
    // access form and value properties via this (keyword)
    var form = this.form;
    var total = parseFloat( this.value ) + parseFloat( form.elements['toppings_tot'].value );
    form.elements['total'].value = formatDecimal(total);
};

document.getElementById('toppings').onchange = function() {
    var form = this.form;
    form.elements['toppings_tot'].value = 0; // reset toppings total
    
    // getSelectedOptions function handles select-multiple
    // pass select list (this) and callback function
    getSelectedOptions( this, calcToppingsTotal );
    
    // add toppings total and size price to get total
    var tops_tot = parseFloat( form.elements['toppings_tot'].value );
    var size_price = parseFloat( form.elements['size'].value );
    form.elements['total'].value = formatDecimal(tops_tot + size_price );
};</script>
</html>
