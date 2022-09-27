import React, { useState } from 'react'
import { makeStyles } from '@material-ui/core/styles'
import Header from '../components/Header'
import { Box,Grid, Typography } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import Setting from '../components/Setting'
import {BiArrowBack,BiPlusCircle,BiXCircle} from "react-icons/bi"
import TextField from '@material-ui/core/TextField'
import Select from "react-dropdown-select"
import Dialog from '@material-ui/core/Dialog'
import DialogActions from '@material-ui/core/DialogActions'
import DialogContent from '@material-ui/core/DialogContent'
import DialogContentText from '@material-ui/core/DialogContentText'
import Slide from '@material-ui/core/Slide'
import { styled } from '@mui/material/styles'
import SwitchUnstyled, { switchUnstyledClasses } from '@mui/core/SwitchUnstyled'
import TopHeading from '../components/TopHeading'
import LeftNav from '../components/LeftNav'
import { Link } from 'react-router-dom'
import DatePicker from 'react-date-picker'
import FormGroup from '@material-ui/core/FormGroup'
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
function AttachProgram ({ options }) {
    const classes = useStyles();
    const [value, setValue] = React.useState('female');

  const handleChange = (event) => {
    setValue(event.target.value);
  };
  const label = { componentsProps: { input: { 'aria-label': 'Demo switch' } } };
  const [value2, onChange2] = useState(new Date());
  const [value3, onChange3] = useState(new Date());
  //  modal  //
  const [open, setOpen] = React.useState(false);

  const handleClickOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };
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
                  <Grid item xs={12}>
                  <Box className={classes.providerlist}>
                  <Box className={classes.pageTop} style={{marginBottom:'30px'}}>
                  <Link to="/toolkit"><Button className={classes.backBtn}><BiArrowBack className={classes.backarrow} /></Button></Link>
                 </Box>
                      <Box className={classes.topcol}>
                    <h3 className={classes.topheading}>Attach Program</h3>
                    <Button className={classes.addprovider} onClick={handleClickOpen}><BiPlusCircle className={classes.icon} /> Add New Program</Button>
                    </Box>
                    <Box className={classes.toprow}>
                        <Box className={classes.thcol}>Programs Name</Box>
                        <Box className={classes.thcol2}>Provider Name</Box>
                        <Box className={classes.thcol3}>Start Date</Box>
                        <Box className={classes.thcol4}>User Count</Box>
                        <Box className={classes.thcol5}>Status</Box>
                    </Box>
                    
                    <Box className={classes.providerrow}>
                        <Box className={classes.tdcol}>CCM</Box>
                        <Box className={classes.tdcol2}><Typography className={classes.tdtext}>Caldwell</Typography></Box>
                        <Box className={classes.tdcol3}><Typography className={classes.tdtext}>12/05/2021</Typography></Box>
                        <Box className={classes.tdcol4}><Typography className={classes.tdtext}>150</Typography></Box>
                        <Box className={classes.tdcol5}>
                         <Link to="/manage-user"><Button className={classes.view}>Active</Button></Link>
                        </Box>
                    </Box>
                    <Box className={classes.providerrow}>
                        <Box className={classes.tdcol}>CCM</Box>
                        <Box className={classes.tdcol2}><Typography className={classes.tdtext}>Caldwell</Typography></Box>
                        <Box className={classes.tdcol3}><Typography className={classes.tdtext}>12/05/2021</Typography></Box>
                        <Box className={classes.tdcol4}><Typography className={classes.tdtext}>200</Typography></Box>
                        <Box className={classes.tdcol5}>
                            <Link to="/manage-user"><Button className={classes.view}>Active</Button></Link></Box>
                    </Box>
                    
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
              <h3 className={classes.Toptext}>Add New Program</h3>
              <form>
              <Grid container spacing={5}>
                  <Grid item xs={12} sm={12}>
                  <Box className={classes.Formcol}>
                          <label>Program Name<span style={{color:'#ff0000'}}>*</span></label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Select Program Name" className={classes.select} style={{width:'100%'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Managing Person<span style={{color:'#ff0000'}}>*</span></label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Select Manage Parson" className={classes.select} style={{width:'100%'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Start Date</label>
                      <DatePicker
        onChange={onChange2}
        value={value2} className={classes.input}
      />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>End Date</label>
                      <DatePicker
        onChange={onChange3}
        value={value3} className={classes.input}
      />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>status</label>
                      <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Select Status" className={classes.select} style={{width:'100%'}} />
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
            </Box>
             
        </div>
    )
}

export default AttachProgram
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
        fontSize:16,
        color:'rgba(0,0,0,0.5)',
        marginBottom:20,
        fontWeight:'600',
        borderBottom:'1px rgba(0,0,0,0.1) solid',
        paddingBottom:5,
        marginTop:20,
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
        flexDirection:'column',
        justifyContent:'flex-start',
        marginBottom:18,
        marginTop:20,
    },
  
    thcol:{
        width:'25%'
    },
    thcol2:{
        width:'30%'
    },
    thcol3:{
        width:'20%'
    },
    thcol4:{
        width:'10%'
    },
    thcol5:{
        width:'15%',
        textAlign:'right'
    },
    tdcol:{
        width:'25%'
    },
    tdcol2:{
        width:'30%'
    },
    tdcol3:{
        width:'20%'
    },
    tdcol4:{
        width:'10%'
    },
    tdcol5:{
        width:'15%',
        textAlign:'right',
        flexDirection:'row',
        alignItems:'center',
        display:'flex',
        justifyContent:'flex-end',
        '& a':{
            textDecoration:'none'
        }
    },
    topcol:{
        display:'flex',
        alignItems:'center',
        justifyContent:'space-between',
        marginBottom:40,
        '& a':{
            textDecoration:'none'
        }
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
        marginTop:0,
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
        },
        '& a':{
            textDecoration:'none'
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
    },
    '& .react-date-picker__wrapper':{
        borderRadius:10,
        border:'1px #D5D5D5 solid',
        backgroundColor:'#F9F9F9',
        padding:'0 10px',
    },
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