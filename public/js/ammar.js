
// get colors
const mainIconBackgroundColor = getComputedStyle(document.documentElement)
    .getPropertyValue('--main-icon-background-color');

const errorColor = getComputedStyle(document.documentElement)
    .getPropertyValue('--error-color');



// form validators
function validate_size(size, min=0, max) {
    if(size >= min && size <= max){
        return true
    }
    return false
  }  
  
  // form eventListener
const country = document.getElementById('country_add_form')
if(country) {
country.addEventListener('input', () => {
    console.log(country.value.length)
    if(!validate_size(country.value.length, 3, 25)){
        country.style.backgroundColor = errorColor
        country.classList.add("invalid-field");
    } else {
        country.style.backgroundColor = mainIconBackgroundColor
        country.classList.remove("invalid-field");
    }
})
}

const city = document.getElementById('city_add_form')
if(city) {
    city.addEventListener('input', () => {
        if(!validate_size(city.value.length, 3, 25)){
            city.style.backgroundColor = errorColor
            city.classList.add("invalid-field");
        } else {
            city.style.backgroundColor = mainIconBackgroundColor
            city.classList.remove("invalid-field");
        }
    })
}

const address = document.getElementById('address_add_form')
if(address) {
    address.addEventListener('input', () => {
        if(!validate_size(address.value.length, 3, 255)){
            address.style.backgroundColor = errorColor
            address.classList.add("invalid-field");
        } else {
            address.style.backgroundColor = mainIconBackgroundColor
            address.classList.remove("invalid-field");
        }
    })
}

const length = document.getElementById('length_add_form')
if(length) {
    length.addEventListener('input', () => {
        console.log(length.value)
        if(!validate_size(length.value, 10, 1000)){
            length.style.backgroundColor = errorColor
            length.classList.add("invalid-field");
        } else {
            length.style.backgroundColor = mainIconBackgroundColor
            length.classList.remove("invalid-field");
        }
    })
}

const width = document.getElementById('width_add_form')
if(width) {
    width.addEventListener('input', () => {
        console.log(width.value)
        if(!validate_size(width.value, 10, 1000)){
            width.style.backgroundColor = errorColor
            width.classList.add("invalid-field");
        } else {
            width.style.backgroundColor = mainIconBackgroundColor
            width.classList.remove("invalid-field");
        }
    })
}

const rooms = document.getElementById('rooms_add_form')
if(rooms) {
    rooms.addEventListener('input', () => {
        console.log(rooms.value)
        if(!validate_size(rooms.value, 1, 50)){
            rooms.style.backgroundColor = errorColor
            rooms.classList.add("invalid-field");
        } else {
            rooms.style.backgroundColor = mainIconBackgroundColor
            rooms.classList.remove("invalid-field");
        }
    })
}

const bathrooms = document.getElementById('bathrooms_add_form')
if(bathrooms) {
    bathrooms.addEventListener('input', () => {
        console.log(bathrooms.value)
        if(!validate_size(bathrooms.value, 0, 50)){
            bathrooms.style.backgroundColor = errorColor
            bathrooms.classList.add("invalid-field");
        } else {
            bathrooms.style.backgroundColor = mainIconBackgroundColor
            bathrooms.classList.remove("invalid-field");
        }
    })
}

const price = document.getElementById('price_add_form')
if(price) {
    price.addEventListener('input', () => {
        console.log(price.value)
        if(!validate_size(price.value, 1, 10000000)){
            price.style.backgroundColor = errorColor
            price.classList.add("invalid-field");
        } else {
            price.style.backgroundColor = mainIconBackgroundColor
            price.classList.remove("invalid-field");
        }
    })
}


const description = document.getElementById('description_add_form')
if(description) {
    description.addEventListener('input', () => {
        if(!validate_size(description.value.length, 10, 500)){
            description.style.backgroundColor = errorColor
            description.classList.add("invalid-field");
        } else {
            description.style.backgroundColor = mainIconBackgroundColor
            description.classList.remove("invalid-field");
        }
    })
}

// form on submit validation
const addApartmentForm = document.getElementById('apartment_form')
if(addApartmentForm) {
    addApartmentForm.addEventListener("submit", (event) => {
       // check for invalid-field classes
       const invalidFields = document.getElementsByClassName("invalid-field");
       if(invalidFields.length > 0){
        event.preventDefault();
        return false;
       }
    })
}