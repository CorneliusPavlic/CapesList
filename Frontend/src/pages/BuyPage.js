import React, { useState, useEffect } from "react";
import axios from "axios";
import Listing from "../components/ListingItem";
import { BuyPageDiv } from "../components/BuyPageStyled";
import NavBar from "../components/NavBar";
import { Outlet, Navigate } from "react-router-dom";



const BuyPage = () => {
  const [post, updatePost] =  useState(["Hello"]);
  useEffect(() => {
      axios.get("http://localhost:80/Listings/all")
        .then(({ data }) => {
              updatePost(data); 
              console.log(data);
        })
    },[])
  
  return (
          <>
            <NavBar></NavBar>     
            <BuyPageDiv style={{margin:"20px", }}>
              {
                post.map((listing) => (
                  <>
                    <a style={{color: "white"}} href={`listing/${listing.LISTING_ID}`}>
                    <Listing style={{color: "white"}} key={listing.id}  listing={listing} />
                    </a>
                  </>
             ))}
             
            </BuyPageDiv>
          
          </>
          
        );
    
};



export default BuyPage;
