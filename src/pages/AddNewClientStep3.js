import React, { useState } from 'react'
import { makeStyles } from '@material-ui/core/styles'
import Header from '../components/Header'
import { Box,Grid, Link, Typography } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import Setting from '../components/Setting'
import {BiArrowBack,} from "react-icons/bi"
import TextField from '@material-ui/core/TextField'
import Select from "react-dropdown-select"
import Slide from '@material-ui/core/Slide'
import ManageAdminUser from '../components/ManageAdminUser'
import AdminDashboard from '../components/AdminDashboard'
import DatePicker from 'react-date-picker'
import { styled } from '@mui/material/styles'
import Stack from '@mui/material/Stack'
import Autocomplete from '@mui/material/Autocomplete'
import TopHeading from '../components/TopHeading'
import LeftNav from '../components/LeftNav'
const Transition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
  });
  const Input = styled('input')({
    display: 'none',
  });
 
function AddNewClientStep3 ({ options }) {
    const classes = useStyles();
    const [value, onChange] = useState(new Date());
    const [value2, onChange2] = useState(new Date());
    return (
        <div>
             <Header />
            <Box className={classes.Pagecontent}>
               <Box className={classes.Leftcol}>
               <Box className={classes.leftnav}>  
               <TopHeading />
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
                  <Button className={classes.TopbackBtn}><BiArrowBack className={classes.backarrow} /></Button>
                  <Box className={classes.providerlist}>
                    <Typography variant="h3" className={classes.topheading}>Add New Client</Typography>
                    <Typography style={{fontFamily:'Poppins',fontSize:14, color:'#696969',fontStyle:'italic'}}>/ Step 3</Typography>
                    {/* <Typography variant="p" className={classes.Righttext}>General Informations</Typography> */}
                </Box>
                <Box className={classes.loginform}>
              <form>
              <Grid container spacing={5}>
                  <Grid item xs={12} sm={12}>
                      <Box className={classes.Formcol}>
                          <label>Account Manager<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} value="DHCT Owner" placeholder="Name of Client"
                        type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Effective Date<span style={{color:'#ff0000'}}>*</span></label>
                          <DatePicker
        onChange={onChange2}
        value={value2} className={classes.input}
      />
    
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Expiration Date<span style={{color:'#ff0000'}}>*</span></label>
                          <DatePicker
        onChange={onChange}
        value={value} className={classes.input}
      />
    
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Billing Contact<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} value="Billing Contact" placeholder="Billing Contact"
                        type="text" />
                      </Box>
                      
                      <Box className={classes.Formcol}>
                      <label>Tiered Pricing<span style={{color:'#ff0000'}}>*</span></label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Yes" className={classes.select} style={{width:'100%'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Billing Rate</label>
                      <Select options={options} onChange={(values) => this.setValues(values)} placeholder="99214" className={classes.select} style={{width:'100%'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Flat Rate</label>
                          <TextField className={classes.input} placeholder="500" type="tel" />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Additional Cost 1</label>
                          <TextField className={classes.input} placeholder="Additional Cost 1" type="tel" />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Additional Cost 2</label>
                          <TextField className={classes.input} placeholder="Additional Cost 2" type="tel" />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Contact (Phone)</label>
                          <TextField className={classes.input} placeholder="Enter Phone Number" type="tel" />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Contact (Email)</label>
                      <TextField className={classes.input} placeholder="Enter Email Address" type="text" />
                      </Box>
                      {/* <Box className={classes.Formcol}>
                      <label>Price Change Date</label>
                      <TextField className={classes.input} placeholder="Price Change Date" type="text" />
                      </Box> */}
                      
                     
                      <Box className={classes.Thcol}>
                         <Box className={classes.col1}>Billing Code</Box>
                         <Box className={classes.col2}>Description</Box>
                         <Box className={classes.col3}>Volume Tier</Box>
                         <Box className={classes.col4}>Unit Price</Box>
                         <Box className={classes.col5}></Box>
                      </Box>
                      <Box className={classes.Tdcol}>
                         <Box className={classes.Tdcol1}>99214</Box>
                         <Box className={classes.Tdcol2}>Initial Visit</Box>
                         <Box className={classes.Tdcol3}>0-100</Box>
                         <Box className={classes.Tdcol4}>10</Box>
                         <Box className={classes.Tdcol5}><Button className={classes.deletebtn}>-</Button></Box>
                      </Box>
                      <Box className={classes.Btncol}>
                      <Button size="large" className={classes.Backbtn}> Back </Button>
                      <Button size="large" className={classes.loginbtn}> Create Client </Button>
                      <Button size="large" className={classes.Previewbtn}> Preview </Button>
                      </Box>
                  </Grid>
                  
                  
              </Grid>
            </form>
            </Box>
                  </Grid>
                  <Grid item xs={4}>
                    
                  </Grid>
               </Grid>
               
               </Box>
            </Box>
             
        </div>
    )
}

export default AddNewClientStep3
const useStyles = makeStyles(() => ({
    Pagecontent:{
        width:'100%',
        display:'flex',
        textAlign:'left'
    },
    deletebtn:{
        width:20,
        height:20,
        background:'#E81010',
        borderRadius:40,
        color:'#fff',
        minWidth:20,
        margin:'0 0 0 60px',
        padding:0,
        fontSize:20,
        fontFamily:'Poppins',
        display:'flex',
        flexDirection:'row',
        alignItems:'center',
        justifyContent:'center',
        '&:hover':{
            backgroundColor:'#333'
        }
    },
    Thcol:{
        display:'flex',
        flexDirection:'row',
        borderBottom:'1px #E3E5E6 solid',
        padding:'5px 0'
    },
    Tdcol:{
        display:'flex',
        flexDirection:'row',
        borderBottom:'1px #E3E5E6 solid',
        padding:'10px 0'
    },
    col1:{
        width:'22%',
        fontSize:14,
        color:'rgba(143,150,153,0.6)'
    },
    col2:{
        width:'36%',
        fontSize:14,
        color:'rgba(143,150,153,0.6)'
    },
    col3:{
        width:'15%',
        fontSize:14,
        color:'rgba(143,150,153,0.6)'
    },
    col4:{
        width:'15%',
        fontSize:14,
        color:'rgba(143,150,153,0.6)',
        textAlign:'right'
    },
    col5:{
        width:'12%'
    },
    Tdcol1:{
        width:'22%'
    },
    Tdcol2:{
        width:'36%'
    },
    Tdcol3:{
        width:'15%'
    },
    Tdcol4:{
        width:'15%',
        textAlign:'right'
    },
    Tdcol5:{
        width:'12%',
        textAlign:'right',
        flexDirection:'row',
        justifyContent:'flex-end'
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
    background:'#F9F9F9',
    height:'50px',
    fontSize:'18px !important',
    paddingLeft:'15px !important',
    paddingRight:'15px !important',
    border:'1px #D5D5D5 solid'
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
    marginBottom:'20px',
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
    '& .MuiAutocomplete-input':{
        borderRadius:10,
        border:'1px #D5D5D5 solid',
        backgroundColor:'#F9F9F9',
        padding:'0 20px !important',
        height:40,
    },
    '& .react-date-picker__wrapper':{
        borderRadius:10,
        border:'1px #D5D5D5 solid',
        backgroundColor:'#F9F9F9',
        padding:'0 10px'

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
        background:'#F9F9F9',
        padding:'0 15px',
        border:'1px #D5D5D5 solid'
    },
    '& .MuiInput-input:focus':{
        border:'1px #D5D5D5 solid',
        boxShadow:'1px 1px 5px 1px rgba(0,0,0,0.1)'
    }
},
TopbackBtn:{
    display:'flex',
        alignItems:'center',
        justifyContent:'flex-start',
        width:30,
        height:20,
        '&:hover':{
            background:'none'
        }
},
Backbtn:{
    background:'#8E8E8E',
    padding:'0 40px',
    width:'180px',
    marginRight:'20px',
    height:'45px',
    borderRadius:'10px',
    color:'#fff',
    marginTop:'20px',
    textTransform:'capitalize',
    '&:hover':{
        background:'#333'
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
    textTransform:'capitalize',
    '&:hover':{
        background:'#333'
    }
},
Previewbtn:{
    background:'none',
    fontSize:16,
    color:'#1612C6',
    height:'45px',
    textTransform:'capitalize',
    padding:'0 40px',
    marginTop:'20px',
    borderRadius:'10px',
    marginLeft:20,
}
   }));