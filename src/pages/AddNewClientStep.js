import React, { useState } from 'react'
import { makeStyles } from '@material-ui/core/styles'
import Header from '../components/Header'
import { Box,Grid, Typography } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import Setting from '../components/Setting'
import {BiArrowBack,} from "react-icons/bi"
import TextField from '@material-ui/core/TextField'
import Select from "react-dropdown-select"
import Slide from '@material-ui/core/Slide'
import ManageAdminUser from '../components/ManageAdminUser'
import AdminDashboard from '../components/AdminDashboard'
import Radio from '@mui/material/Radio'
import RadioGroup from '@mui/material/RadioGroup'
import FormControlLabel from '@mui/material/FormControlLabel'
import FormControl from '@mui/material/FormControl'
import FormLabel from '@mui/material/FormLabel'
import profile from '../images/profile-image.png'
import IconButton from '@mui/material/IconButton'
import Stack from '@mui/material/Stack'
import { BiCamera } from "react-icons/bi"
import { styled } from '@mui/material/styles'
import SwitchUnstyled, { switchUnstyledClasses } from '@mui/core/SwitchUnstyled'
import TopHeading from '../components/TopHeading'
import LeftNav from '../components/LeftNav'
import DatePicker from 'react-date-picker'
import { Link } from 'react-router-dom'
const Transition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
  });
  const Input = styled('input')({
    display: 'none',
  });
  const Root = styled('span')`
  font-size: 0;
  position: relative;
  display: inline-block;
  width: 45px;
  height: 22px;
  margin: 10px;
  cursor: pointer;

  &.${switchUnstyledClasses.disabled} {
    opacity: 0.4;
    cursor: not-allowed;
  }

  & .${switchUnstyledClasses.track} {
    background: #E1DDDD;
    border-radius: 40px;
    display: block;
    height: 100%;
    width: 100%;
    position: absolute;
  }

  & .${switchUnstyledClasses.thumb} {
    display: block;
    width: 15px;
    height: 15px;
    top: 3px;
    left: 3px;
    border-radius:40px;
    background-color: #10C20C;
    position: relative;
    transition: all 200ms ease;
  }

  &.${switchUnstyledClasses.focusVisible} .${switchUnstyledClasses.thumb} {
    background-color: #E1DDDD;
    box-shadow: 0 0 1px 8px rgba(0, 0, 0, 0.25);
  }

  &.${switchUnstyledClasses.checked} {
    .${switchUnstyledClasses.thumb} {
      left: 27px;
      top: 3px;
      background-color: #fff;
    }

    .${switchUnstyledClasses.track} {
      background: #E1DDDD;
    }
  }

  & .${switchUnstyledClasses.input} {
    cursor: inherit;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    z-index: 1;
    margin: 0;
  }
`;
function AddNewClientStep ({ options }) {
    const classes = useStyles();
    const [value, setValue] = React.useState('female');

  const handleChange = (event) => {
    setValue(event.target.value);
  };
  const label = { componentsProps: { input: { 'aria-label': 'Demo switch' } } };
  const [value2, onChange2] = useState(new Date());
    return (
        <div>
             <Header />
            <Box className={classes.Pagecontent}>
               <Box className={classes.Leftcol}>
               <Box className={classes.leftnav}>
                   <TopHeading />  
                 <Box className={classes.pageTop} style={{marginBottom:'40px'}}>
                     
                 </Box>
                 {/* left Accordion*/}
                <LeftNav />
                 <Box className={classes.bottomnav}>
                 <Setting />
               </Box>
               </Box>
               
               </Box>
               {/* right col */}
               <Box className={classes.Rightcol}>
               
               <Grid container spacing={3}>
                  <Grid item xs={8}>
                  <Link to="/new-clients"><Button className={classes.backBtn}><BiArrowBack className={classes.backarrow} /></Button></Link>
                  <Box className={classes.providerlist}>
                    <Typography variant="h3" className={classes.topheading}>Add New Client</Typography>
                    <Typography style={{fontFamily:'Poppins',fontSize:14, color:'#696969',fontStyle:'italic'}}>/ Step 2</Typography>
                    {/* <Typography variant="p" className={classes.Righttext}>General Informations</Typography> */}
                </Box>
                <Box className={classes.loginform}>
              <form>
              <Grid container spacing={5}>
                  <Grid item xs={12} sm={12}>
               
                  <Typography variant="h5" className={classes.FormHeading}>Client Admin Information</Typography>
                 
                      <Box className={classes.Formcol}>
                          <label>First Name<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} placeholder="First Name"
                        type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Last Name</label>
                          <TextField className={classes.input} placeholder="Last Name"
                        type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>User Name<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} placeholder="User Name"
                        type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Date of Birth</label>
                          <DatePicker
        onChange={onChange2}
        value={value2} className={classes.input}
      />
    
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Phone<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} placeholder="Phone Number" type="tel" />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Email<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} placeholder="Email Address" type="text" />
                      </Box>
                     
                      <Box className={classes.Formcol}>
                      <label>Password<span style={{color:'#ff0000'}}>*</span></label>
                      <TextField className={classes.input} placeholder="Password" type="password" />
                      </Box>
                     
                      
                      <Box className={classes.Btncol}>
                      <Link to="/new-clients"><Button size="large" className={classes.backButton}> Back </Button></Link>
                      <Link to="/new-clients-step3"><Button size="large" className={classes.loginbtn}> Next </Button></Link>
                      </Box>
                  </Grid>
                  
                  
              </Grid>
            </form>
            </Box>
                  </Grid>
                  {/* <Grid item xs={4}>
                    <Box className={classes.ProfileCol}>
                        <Box className={classes.ProfileImg}>
                        <img src={profile} alt="profile images" />
                        </Box>
                        <Box className={classes.UploadBtn}>
                        <label htmlFor="icon-button-file">
        <Input accept="image/*" id="icon-button-file" type="file" />
        <IconButton color="primary" aria-label="upload picture" component="span">
          <BiCamera color="#121212" />
        </IconButton>
      </label>
      <h3 style={{fontSize:14,color:'#121212',fontFamily:'Poppins',fontWeight:'400'}}>Upload</h3>
                        </Box>
                        <Box className={classes.StatusCol}>
                            <Typography variant="h4" style={{fontSize:18,color:'#121212',fontFamily:'Poppins',marginBottom:20,}}>Client Status</Typography>
                            <Box style={{display:'flex',width:'90%',flexDirection:'row',alignItems:'center',justifyContent:'space-between'}}>
                                <Typography variant="h5" style={{fontSize:14,color:'#121212',fontFamily:'Poppins'}}>Status : Active</Typography>
                                <SwitchUnstyled component={Root} {...label} defaultChecked />
                            </Box>
                        </Box>
                    </Box>
                  </Grid> */}
               </Grid>
               
               </Box>
            </Box>
             
        </div>
    )
}

export default AddNewClientStep
const useStyles = makeStyles(() => ({
    Pagecontent:{
        width:'100%',
        display:'flex',
        textAlign:'left'
    },
    StatusCol:{
        width:'80%',
        background:'#F9F9F9',
        borderRadius:'15px 10px 10px',
        border:'1px #D5D5D5 solid',
        padding:'10px',
        display:'flex',
        flexDirection:'column',
        alignItems:'center',
        justifyContent:'center',
        marginTop:30,
    },
    FormHeading:{
        fontFamily:'Poppins',
        fontSize:17,
        color:'rgba(0,0,0,0.5)',
        marginBottom:20,
        fontWeight:'600',
        borderBottom:'1px rgba(0,0,0,0.1) solid',
        paddingBottom:10,
    },
    backBtn:{
        display:'flex',
        alignItems:'center',
        justifyContent:'flex-start',
        width:30,
        height:20,
        '&:hover':{
            background:'none'
        }
    },
    UploadBtn:{
        display:'flex',
        flexDirection:'row',
        justifyContent:'center',
        alignItems:'center'
    },
    ProfileCol:{
        padding:'90px 25px',
        display:'flex',
        justifyContent:'center',
        flexDirection:'column',
        alignItems:'center'
    },
    ProfileImg:{
        width:150,
        height:150,
        borderRadius:20,
        display:'fle',
        justifyContent:'center',
        overflow:'hidden',
        '& img':{
            width:'100%'
        }
    },
    Btncol:{
        display:'flex',
        flexDirection:'row',
        justifyContent:'flex-end',
        alignItems:'center'
    },
    providerlist:{
        fontSize:'16px',
        display:'flex',
        flexDirection:'row',
        justifyContent:'flex-start',
        alignItems:'center',
        marginBottom:50,
        marginTop:20,
    },
    Righttext:{
        fontSize:16,
        color:'#696969'
    },
    Btnlink:{
        fontSize:'16px',
        color:'#7087A7',
        backgroundColor:'transparent',
        padding:'0 10px',
        display:'flex',
        justifyContent:'flex-start',
        textTransform:'capitalize',
        '&:hover':{
            color:'#000',
            backgroundColor:'#fff'
        }
    },
    Leftbutton:{
        display:'flex',
        flexDirection:'column',
        justifyContent:'flex-start'
    },
    Accessbtn:{
        fontSize:'14px',
        color:'#141621',
        textTransform:'capitalize',
    },
    addprovider:{
        fontSize:'16px',
        color:'#7087A7',
        textTransform:'capitalize',
        backgroundColor:'transparent',
        marginRight:'10px',
        display:'flex',
        alignItems:'center'
    },
    btncheck:{
        color:'#5FD827',
        marginLeft:'10px'
    },
    btncancel:{
        color:'#C13229',
        marginLeft:'10px'
    },
    btncol:{
        display:'flex',
        justifyContent:'flex-end'
    },
    topheading:{
        marginBottom:'0px',
        fontWeight:'600',
        color:'#141621',
        fontFamily:'Poppins',
        fontSize:18,
        display:'flex',
        alignItems:'center',
        justifyContent:'flex-start',
        marginRight:10,
    },
    toprow:{
        width:'100%',
        borderBottom:'2px #E3E5E5 solid',
        display:'flex',
        color:'#919699',
        paddingBottom:'10px',
    },
    pageTop:{
        textAlign:'left',
        marginBottom:'40px',
        display:'flex',
        '& button':{
            padding:'0px',
            background:'none',
            color:'#919699',
            fontSize:'15px',
            textTransform:'capitalize',
            fontWeight:'500'
        }
    },
    profile:{
        width:'80px',
        height:'80px',
        borderRadius:'50%',
        overflow:'hidden',
        '& img':{
            width:'100%'
        }
    },
    backarrow:{
        color:'#7087A7',
        fontSize:'20px',
        marginRight:'8px'
    },
    Leftcol:{
        width:'15%',
        padding:'20px 3%',
        position:'relative',
        minHeight:'1050px'
    },
    bottomnav:{
        position:'absolute',
        bottom:'0px',
        left:'0px'
    },
    leftnav:{
    position:'absolute',
    top:'15px',
    bottom:'15px',
    left:'40px',
    right:'40px'
    },
    Rightcol:{
        width:'73%',
        padding:'20px 3%',
        '& a':{
            textDecoration:'none'
        },
        borderLeft:'1px #F6F6F6 solid',
        '& .MuiAccordionSummary-root':{
            borderBottom:'2px #E3E5E5 solid',
            height:'40px',
            color:'#919699',
            fontFamily:'Poppins',
        },
        '& .MuiAccordion-root:before':{
            display:'none'
        }
    },
    
Downarrow:{
    fontSize:'20px',
    color:'#7087A7',
    marginLeft:'5px'
},

Editbtn:{
  background:'#fff',
  border:'1px #AEAEAE solid',
  width:'60px',
  height:'30px',
  color:'#7087A7',
  textTransform:'capitalize',
  borderRadius:'10px',
  fontWeight:'600',
  '&:hover':{
    background:'#7087A7',
    color:'#fff',
  }
},

icon:{
  color:'#7087A7',
  fontSize:'20px',
  marginRight:'10px'
},
providerrow:{
    width:'100%',
    borderBottom:'1px #E3E5E5 solid',
    padding:'15px 0',
    display:'flex',
    '& p':{
        textAlign:'left'
    }
},
providerbtn:{
    display:'flex',
    cursor:'pointer',
    '& span':{
        display:'flex',
        flexDirection:'column',
        width:'20px',
        marginRight:'10px',
        '& button':{
            background:'none',
            border:'none',
            height:'10px',
            cursor:'pointer'
        }
    }
},

pageTop:{
    textAlign:'left',
    '& button':{
        padding:'0px',
        background:'none',
        color:'#919699',
        fontSize:'15px',
        textTransform:'capitalize',
        fontWeight:'500'
    }
},
checkicon:{
    fontSize:'25px',
    color:'#47C932'
},
inputfile:{
    display:'none'
},
select:{
    width:'100%',
    border:'none !important',
    borderRadius:'10px !important',
    border:'1px #D5D5D5 solid',
    backgroundColor:'#F9F9F9',
    height:'50px',
    fontSize:'18px !important',
    paddingLeft:'15px !important',
    paddingRight:'15px !important'
},
Toptext:{
    fontSize:'18px',
    color:'#141621',
    fontWeight:'600',
    marginTop:'-15px',
    marginBottom:'30px'
},
Textheading:{
    fontSize:'16px',
    marginTop:'0px',
    fontWeight:'500'
},
Addbtn:{
    width:'180px',
    height:'45px',
    background:'#E13F66',
    borderRadius:'10px',
    color:'#fff',
    boxShadow:'0px 0px 12px 6px rgba(0, 0, 0, 0.18)',
    display:'flex',
    justifyContent:'center',
    alignItems:'center',
    textTransform:'capitalize',
    fontSize:'16px',
    '&:hover':{
        background:'#000'
    }
},
cancelbtn:{
    background:'#DADADA',
    borderRadius:'10px',
    textTransform:'capitalize',
    height:'45px',
    width:'120px',
    color:'#fff',
    fontWeight:'600',
    '&:hover':{
        background:'#000'
    }
},
nextbtn:{
    background:'#7087A7',
    borderRadius:'10px',
    textTransform:'capitalize',
    height:'45px',
    width:'120px',
    color:'#fff',
    fontWeight:'600',
    marginLeft:'15px',
    '&:hover':{
        background:'#000'
    }
},
Formcol:{
    display:'flex',
    alignItems:'center',
    marginBottom:'30px',
    '&>div':{
        width:'100%'
    },
    '& p':{
        fontSize:'18px',
        margin:'0px'
    },
    '& label':{
        flex:'0 0 205px',
        color:'#000',
        fontSize:'15px',
        fontWeight:'400'
    },
    '& .react-dropdown-select-input':{
        width:'100%'
    }
},
addprovider:{
    fontSize:'16px',
    color:'#7087A7',
    textTransform:'capitalize'
},
btncol:{
    display:'flex',
    justifyContent:'flex-end',
    marginTop:'100px'
},
input:{ 
    border:'none',
    borderRadius:'10px',
    height:'50px',
    width:'100%',
},
loginform:{
    width:'100%',
    '& .MuiInput-underline:before':{
        display:'none'
    },
    
    '& .react-date-picker__wrapper':{
        borderRadius:10,
        border:'1px #D5D5D5 solid',
        backgroundColor:'#F9F9F9',
        padding:'0 10px',
    },
    '& .react-date-picker__inputGroup__input:focus':{
        border:0,
        boxShadow:'none'
     },
    '& .MuiInput-underline:after':{
        display:'none'
    },
    '& .MuiInput-formControl':{ 
        height:'50px',
        
    },
    '& .MuiInput-input:focus':{
        border:'1px #7087A7 solid',
        boxShadow:'2px 2px 10px 1px rgba(0,0,0,0.3)'
    },
    '& .MuiInputBase-input':{
        height:'50px',
        borderRadius:'10px',
        border:'1px #D5D5D5 solid',
        backgroundColor:'#F9F9F9',
        padding:'0 15px'
    }
},
loginbtn:{
    background:'#1612C6',
    padding:'0 40px',
    width:'180px',
    height:'45px',
    borderRadius:'10px',
    color:'#fff',
    marginTop:'20px',
    '&:hover':{
        background:'#333'
    }
},
backButton:{
    background:'#8E8E8E',
    padding:'0 40px',
    width:'180px',
    height:'45px',
    borderRadius:'10px',
    color:'#fff',
    marginRight:15,
    marginTop:'20px',
    '&:hover':{
        background:'#333'
    }
},
modal:{
    '& .MuiPaper-rounded':{
        borderRadius:'10px !important',
        padding:'20px',
        width:'700px',
        maxWidth:'700px'
    }
},
ccmmodal:{
    borderRadius:'10px',
},
modalbtn:{
    display:'flex',
    justifyContent:'space-between',
    marginRight:'30px',
    marginLeft:'15px',
    alignItems:'center'
},
btncol:{
    display:'flex',
    justifyContent:'flex-end',
},
closebtn:{
    width:'40px',
    position:'absolute',
    right:'10px',
    height:'40px',
    background:'#fff',
    top:'10px',
    minWidth:'40px',
    '&:hover':{
        background:'#fff'
    }
},
closeicon:{
    fontSize:'25px',
    color:'#7087A7'
}, 
   }));