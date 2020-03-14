pragma solidity ^0.5.1;

contract Voting {

    struct TPS {
        uint totalSuara;
    }

    mapping(uint => mapping (uint => TPS)) public suara;
    uint public Total;

    function vote (uint tpsId,uint kandidatId) public {
        suara[tpsId][kandidatId].totalSuara++;
    }
}