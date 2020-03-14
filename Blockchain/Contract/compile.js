const path = require('path')
const fs = require('fs')
const solc = require('solc')

const inboxPath = path.resolve(__dirname, '', 'Voting.sol')

const source = fs.readFileSync(inboxPath, 'utf8')
console.log(source);

var input = {
    language: 'Solidity',
    sources: {
        'Voting.sol': {
            content: source
        }
    },
    settings: {
        outputSelection: {
            '*': {
                '*': ['*']
            }
        }
    }
}

var output = JSON.parse(solc.compile(JSON.stringify(input)))
console.log(output.contracts['Voting.sol'].Voting);

module.exports = output.contracts['Voting.sol'].Voting
