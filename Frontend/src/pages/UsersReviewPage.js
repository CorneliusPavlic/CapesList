import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import axios from "axios";
import Review from "../components/Reviewitem";
import NavBar from "../components/NavBar";
  

function Reviews() {
  const { userID } = useParams();

  const [post, updatePost] =  useState(["Hello"]);
  useEffect(() =>{
    axios.get(`http://localhost:80/Reviews/${userID}`)
    .then ((response) => {
      updatePost(response.data);
    });
  },[]);


  return (
    
    <>
    <NavBar></NavBar>
    <h1 style={{color: 'White', textAlign: 'center'}}>{post[0]['SELLER']}'s Seller Reviews</h1>
    {post.map((review) => (
                <Review key={review.id}  review={review} />
             ))}
    
    </>
  )
    
};


export default Reviews;