const originalString = "kmcode"

const reverseString = reversedString(originalString)
console.log(reverseString);


function reversedString (str) {
    let reversed =''

    for(let i=str.length - 1; i>=0; i--){
        reversed =reversed +  str[i]
    }

    return reversed
}
