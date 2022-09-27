import { Box } from '@material-ui/core'
import React, {
    useEffect,
    Fragment,
    useCallback,
    useState,
    useRef,
  } from "react";
import { makeStyles } from '@material-ui/core/styles';
import logo from '../images/IGA-logo.png';
import loginbg from '../images/login-bg.jpg';
import TextField from '@material-ui/core/TextField';
import Checkbox from '@material-ui/core/Checkbox';
import FormGroup from '@material-ui/core/FormGroup';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import Button from '@material-ui/core/Button';
import { Link } from 'react-router-dom';
import LeftNav from '../components/LeftNav';
function ManageBilling() {
    const classes = useStyles();
    return (
        <div>
            <Box className={classes.Billing}>
            <Box className={classes.Leftcol}>
                <LeftNav />
                </Box>
                <Box className={classes.Maincontent}></Box>
                </Box>
        </div>
    )
}

export default ManageBilling
const useStyles = makeStyles(() => ({
    Billing:{
       display:'flex',
       width:'100%',
       '& a':{
           textDecoration:'none'
       }
   },
   Maincontent:{
    width:'75%'
   },
   Leftcol:{
       width:'25%',
       textAlign:'left',
   },
   toptext:{
    fontSize:'34px',
    fontWeight:'bold',
    marginBottom:'50px'
   },
   
   input:{ 
       border:'none',
       borderRadius:'10px',
       height:'50px',
       width:'100%',
       marginBottom:'30px'
   },
   loginform:{
       width:'70%',
       '& .MuiInput-underline:before':{
           display:'none'
       },
       '& .MuiInput-underline:after':{
           display:'none'
       },
       '& .MuiInput-formControl':{ 
           height:'50px',
           
       },
       '& .MuiInputBase-input':{
           height:'50px',
           borderRadius:'10px',
           background:'#F1F1F1',
           padding:'0 15px'
       },
       '& .MuiInput-input:focus':{
           border:'1px #7087A7 solid',
           boxShadow:'2px 2px 10px 1px rgba(0,0,0,0.3)'
       }
   },
   loginbtn:{
       background:'#7087A7',
       padding:'0 40px',
       width:'142px',
       height:'45px',
       borderRadius:'10px',
       color:'#fff',
       marginTop:'20px',
       '&:hover':{
           background:'#333'
       }
   },
   rightcontent:{
       width:'80%',
       padding:'0 10%',
       position:'absolute',
       display:'flex',
       justifyContent:'center',
       alignItems:'flex-start',
       flexDirection:'column',
       left:'0px',
       top:'0px',
       bottom:'0px',
   },
   rightheading:{
    color:'#fff',
    margin:'0px'
   },
   righttext:{
    textAlign:'left',
    color:'#fff'
   }
  }));