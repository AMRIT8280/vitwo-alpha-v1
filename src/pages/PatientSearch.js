import React, { useState } from 'react'
import { makeStyles } from '@material-ui/core/styles'
import Header from '../components/Header'
import { Box,Grid } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import Setting from '../components/Setting'
import {BiArrowBack,BiXCircle} from "react-icons/bi"
import Typography from '@material-ui/core/Typography'
import PropTypes from 'prop-types'
import TextField from '@material-ui/core/TextField'
import Select from "react-dropdown-select"
import Dialog from '@material-ui/core/Dialog'
import DialogActions from '@material-ui/core/DialogActions'
import DialogContent from '@material-ui/core/DialogContent'
import DialogContentText from '@material-ui/core/DialogContentText'
import Slide from '@material-ui/core/Slide'
import FormGroup from '@material-ui/core/FormGroup'
import DatePicker from 'react-date-picker'
import { Link } from 'react-router-dom'
const Transition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
  });
 
function PatientSearch({ options }) {
    const classes = useStyles();
    const [value, setValue] = React.useState(0);

  const handleChange = (event, newValue) => {
    setValue(newValue);
  };
//  modal  //
  const [open, setOpen] = React.useState(false);

  const handleClickOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };
  const [value2, onChange2] = useState(new Date());
    return (
        <div>
             <Header />
            <Box className={classes.Pagecontent}>
               
               {/* right col */}
               <Box className={classes.Rightcol}>
               <Link to="clients"><Button className={classes.backBtn}><BiArrowBack className={classes.backarrow} /></Button></Link>
               <Box className={classes.Topfilter}>
                 <Box style={{marginRight:15,}}>
                 <label>Provider Filter</label>
                      <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Select Provider" className={classes.select} style={{width:'200px'}} />
                 </Box>
                 <Box style={{marginRight:15,}}>
                   <label>Program Filter</label>
                      <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Select Program " className={classes.select} style={{width:'200px'}} /></Box>
                 <Box style={{display:'flex',flexDirection:'row',width:'50%'}}>
                   <Box style={{width:'60%'}}>
                  <label>Patient Search</label>
                  <TextField className={classes.input} placeholder="Patient Search" type="text" />
                  </Box>
                  <Button className={classes.Searchbtn}>Search</Button>
                 </Box>
                </Box> 
                {/* filter end */}
                <Box className={classes.PatientTable}>
                  <Box className={classes.PatientTop}>
                    <Typography variant="h6">Search Result for 'Burroughs'</Typography>
                    <Button className={classes.Addbtn} onClick={handleClickOpen}>Add New Patient</Button>
                  </Box>
                  <Box className={classes.Throw}>
                      <Box className={classes.Thcol}><label>Provider</label></Box>
                      <Box className={classes.Thcol2}><label>First Name</label></Box>
                      <Box className={classes.Thcol3}><label>Last Name</label></Box>
                      <Box className={classes.Thcol4}><label>DOB</label></Box>
                      <Box className={classes.Thcol5}><label>EMR_ID</label></Box>
                      <Box className={classes.Thcol6}><label>HRPM_ID</label></Box>
                      <Box className={classes.Thcol7}><label>Phone</label></Box>
                      <Box className={classes.Thcol8}><label>Program</label></Box>
                      <Box className={classes.Thcol9}><label>Date Loaded</label></Box>
                      <Box className={classes.Thcol10}><label>Agent ID</label></Box>
                      <Box className={classes.Thcol11}><label>Finalize Date</label></Box>
                      <Box className={classes.Thcol12}><label>Status</label></Box>
                      <Box className={classes.Thcol13}><label>Careplan</label></Box>
                  </Box>
                  <Box className={classes.Tdrow}>
                     <Box className={classes.Thcol}>Caldwell</Box>
                      <Box className={classes.Thcol2}>Mike</Box>
                      <Box className={classes.Thcol3}>Burroughs</Box>
                      <Box className={classes.Thcol4}>5/27/1942</Box>
                      <Box className={classes.Thcol5}>9999</Box>
                      <Box className={classes.Thcol6}>37</Box>
                      <Box className={classes.Thcol7}>301-535-0907</Box>
                      <Box className={classes.Thcol8}><Link to="">CCM</Link></Box>
                      <Box className={classes.Thcol9}>12/18/2019</Box>
                      <Box className={classes.Thcol10}>Admin DHCT</Box>
                      <Box className={classes.Thcol11}>8/13/20</Box>
                      <Box className={classes.Thcol12}><Link to="">Active</Link></Box>
                      <Box className={classes.Thcol13}><Button className={classes.Downloadbtn}>Download PDF</Button></Box>
                  </Box>
                  <Box className={classes.BottomCol}><Button className={classes.ViewAll}>View All Patient</Button></Box>
                  </Box> 
               </Box>
                 {/* modal */}
                 <Dialog  className={classes.modal}
        open={open}
        TransitionComponent={Transition}
        keepMounted
        onClose={handleClose}
        aria-labelledby="alert-dialog-slide-title"
        aria-describedby="alert-dialog-slide-description"
      >
        <DialogContent className={classes.ccmmodal}>
            <Box className={classes.btncol}>
            <Button onClick={handleClose} className={classes.closebtn}><BiXCircle className={classes.closeicon} /></Button>
            </Box>
          <DialogContentText id="alert-dialog-slide-description">
          <Box className={classes.loginform}>
              <h3 className={classes.Toptext}>Add New Patient</h3>
              <form>
              <Grid container spacing={5}>
                  <Grid item xs={12} sm={12}>
                  <Box className={classes.Formcol}>
                          <label>Patient EMR ID<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} placeholder="Enter Patient EMR ID"
                        type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>First Name<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} placeholder="Enter First Name"
                        type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Last Name<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} placeholder="Enter Last Name" type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Date of Birth<span style={{color:'#ff0000'}}>*</span></label>
                      <DatePicker
        onChange={onChange2}
        value={value2} className={classes.input}
      /></Box>
      <Box className={classes.Formcol}>
      <label>Email</label>
      <TextField className={classes.input} placeholder="Enter Email" type="text" />
  </Box>
  <Box className={classes.Formcol}>
      <label>Phone Number<span style={{color:'#ff0000'}}>*</span></label>
      <TextField className={classes.input} placeholder="Enter Phone Number" type="tel" />
  </Box>
  <Box className={classes.Formcol}>
      <label>Address<span style={{color:'#ff0000'}}>*</span></label>
      <TextField className={classes.input} placeholder="Enter Address" type="tel" />
  </Box>
  <Box className={classes.Formcol}>
                          <label>State<span style={{color:'#ff0000'}}>*</span></label>
                      <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Select State" className={classes.select} />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>City<span style={{color:'#ff0000'}}>*</span></label>
                      <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Select State" className={classes.select} />
                      </Box>
                      <Box className={classes.Formcol}>
      <label>Zipcode<span style={{color:'#ff0000'}}>*</span></label>
      <TextField className={classes.input} placeholder="Enter Zipcode" type="tel" />
  </Box>
                  </Grid>
                  
              </Grid>
            </form>
            </Box>
          </DialogContentText>
        </DialogContent>
        <DialogActions className={classes.modalbtn}>
        <FormGroup aria-label="position" row>
        </FormGroup>
        <Button size="large" className={classes.loginbtn}>
        Save
        </Button>
        </DialogActions>
      </Dialog>
               
            </Box>
        </div>
    )
}

export default PatientSearch
const useStyles = makeStyles(() => ({
    Pagecontent:{
        width:'100%',
        display:'flex',
        textAlign:'left'
    },
    BottomCol:{
      display:'flex',
      flexDirection:'row',
      justifyContent:'flex-end',
      marginTop:20,
    },
    Toptext:{
      fontSize:20,
      marginTop:0,
      fontWeight:'600',
      fontFamily:'Poppins',
      color:'#121212'
    },
    PatientTop:{
      display:'flex',
      flexDirection:'row',
      justifyContent:'space-between',
      alignItems:'center',
      marginBottom:40,
    },
    Throw:{
      display:'flex',
      alignItems:'center',
      borderBottom:'1px #ccc solid',
      paddingBottom:7,
      fontSize:14,
      '& label':{
        color:'#919699'
      }
    },
    Thcol:{
      width:'8%'
    },
    Thcol2:{
      width:'8%'
    },
    Thcol3:{
      width:'8%'
    },
    Thcol4:{
      width:'8%'
    },
    Thcol5:{
      width:'5%'
    },
    Thcol6:{
      width:'6%'
    },
    Thcol7:{
      width:'10%'
    },
    Thcol8:{
      width:'8%'
    },
    Thcol9:{
      width:'8%'
    },
    Thcol10:{
      width:'8%'
    },
    Thcol11:{
      width:'8%'
    },
    Thcol12:{
      width:'5%'
    },
    Thcol13:{
      width:'10%'
    },
    Tdrow:{
      display:'flex',
      alignItems:'center',
      borderBottom:'1px #ccc solid',
      padding:'10px 0',
      fontSize:14,
    },
    Searchbtn:{
      background:'#7087A7',
      borderRadius:10,
      display:'flex',
      color:'#fff',
      height:50,
      paddingLeft:15,
      paddingRight:15,
      marginLeft:10,
      textTransform:'capitalize',
      marginTop:28,
      '&:hover':{
        background:'rgba(0,0,0,0.8)'
      }
    },
    Downloadbtn:{
      background:'#0A70E8',
      borderRadius:10,
      display:'flex',
      color:'#fff',
      height:35,
      fontSize:14,
      paddingLeft:15,
      paddingRight:15,
      textTransform:'capitalize',
      '&:hover':{
        background:'rgba(0,0,0,0.8)'
      }
    },
    ViewAll:{
      background:'#7087A7',
      borderRadius:10,
      display:'flex',
      color:'#fff',
      height:40,
      fontSize:14,
      paddingLeft:20,
      paddingRight:20,
      textTransform:'capitalize',
      '&:hover':{
        background:'rgba(0,0,0,0.8)'
      }
    },
    Addbtn:{
      background:'#1612C6',
      borderRadius:10,
      display:'flex',
      color:'#fff',
      height:40,
      fontSize:14,
      paddingLeft:15,
      paddingRight:15,
      textTransform:'capitalize',
      '&:hover':{
        background:'rgba(0,0,0,0.8)'
      }
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
  ModalTop:{
    display:'flex',
    flexDirection:'row',
    alignItems:'center',
    justifyContent:'space-between',
    marginBottom:25,
    
},
  input:{ 
    border:'none',
    borderRadius:'10px',
    height:'50px',
    width:'100%',
},
Topfilter:{
    width:'100%',
    display:'flex',
    marginTop:30,
    marginBottom:30,
    flexDirection:'row',
    '& label':{ color:'#666',marginBottom:5, display:'flex'},
    '& .MuiInput-underline:before':{
        display:'none'
    },
    '& .MuiInput-underline:after':{
        display:'none'
    },
    '& .MuiInput-formControl':{ 
        height:'50px',
        
    },
    '& .MuiInput-input:focus':{
        border:'1px #0074D9 solid',
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
    btncol:{
        display:'flex',
        justifyContent:'flex-end',
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
  
    backarrow:{
        color:'#7087A7',
        fontSize:'20px',
        marginRight:'8px'
    },
    Leftcol:{
        width:'15%',
        padding:'20px 3%',
        position:'relative',
        minHeight:'700px'
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
        width:'100%',
        padding:'20px 3%',
        borderLeft:'1px #F6F6F6 solid',
        '& .MuiAccordionSummary-root':{
            borderBottom:'1px #E3E5E5 solid',
            height:'40px',
            color:'#919699',
            padding:'0px',
            fontFamily:'Poppins',
        },
        '& .MuiAccordion-root:before':{
            display:'none'
        },
        '& .MuiTab-root':{
          minWidth:'18%',
        },
        '& .MuiTab-root:nth-child(6)':{
          minWidth:'30%',
        },
        '& .MuiTab-root:nth-child(7)':{
          minWidth:'30%',
        },
        '& .MuiBox-root':{
            paddingLeft:'0px',
            paddingRight:'0px'
        },
        '& .MuiTab-root':{
            minHeight:'40px'
          },
          '& .MuiTabs-root':{
            minHeight:'40px'
          }
    },
    loginbtn:{
      background:'#1612C6',
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
modal:{
  '& .MuiPaper-rounded':{
      borderRadius:'10px !important',
      padding:'20px',
      width:'550px',
      maxWidth:'550px'
  }
},
ccmmodal:{
  borderRadius:'10px',
  '& label':{ color:'#666',marginBottom:5, display:'flex', flex:'0 0 150px'},
    '& .MuiInput-underline:before':{
        display:'none'
    },
    '& .MuiInput-underline:after':{
        display:'none'
    },
    '& .MuiInput-formControl':{ 
        height:'50px',
        
    },
    '& .MuiInput-input:focus':{
        border:'1px #0074D9 solid',
        boxShadow:'2px 2px 10px 1px rgba(0,0,0,0.3)'
    },
    '& .MuiInputBase-input':{
        height:'50px',
        borderRadius:'10px',
        border:'1px #D5D5D5 solid',
        backgroundColor:'#F9F9F9',
        padding:'0 15px'
    },
    '& .react-date-picker__wrapper':{
      borderRadius:10,
      border:'1px #D5D5D5 solid',
      backgroundColor:'#F9F9F9',
      padding:'0 10px',
  },
},
modalbtn:{
  display:'flex',
  justifyContent:'space-between',
  marginRight:'30px',
  marginLeft:'15px',
  alignItems:'center'
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