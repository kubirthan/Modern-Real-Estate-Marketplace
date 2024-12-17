//hello kubi
function countCharacterOccurence(str){
    const counts = {}

    for(let char of str){
        if(counts[char]){
            counts[char]++
        }else{
            counts[char] = 1
        }
    }

    return counts
}

const inputString = "hello kubi"
console.log(countCharacterOccurence(inputString));
