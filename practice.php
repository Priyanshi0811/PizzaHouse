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