//find longest word in sentences

function findLongestWord(sentence){
    const words = sentence.split(' ')

    let longestWord = ''

    for(const word of words){
        if(word.length > longestWord.length) {
            longestWord = word
        }
    }
    return longestWord
}
const sentence = "find the longest word in this sentences"

console.log(findLongestWord(sentence));
