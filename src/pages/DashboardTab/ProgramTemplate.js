import React, { useState } from 'react'
import { makeStyles } from '@material-ui/core/styles'
import { Button, Typography } from '@material-ui/core'
import Select from "react-dropdown-select"
import { Box,Grid, Link } from '@material-ui/core'
import {BiChevronUp, BiChevronDown,BiArrowBack, BiPlusCircle,BiXCircle,BiCheckCircle} from "react-icons/bi"
import Dialog from '@material-ui/core/Dialog'
import DialogActions from '@material-ui/core/DialogActions'
import DialogContent from '@material-ui/core/DialogContent'
import DialogContentText from '@material-ui/core/DialogContentText'
import Slide from '@material-ui/core/Slide'
import TextField from '@material-ui/core/TextField'
import FormGroup from '@material-ui/core/FormGroup'
import { pink } from '@mui/material/colors'
import Checkbox from '@mui/material/Checkbox'
import { BiPlus,BiMinus } from "react-icons/bi"
import DatePicker from 'react-date-picker'
const label = { inputProps: { 'aria-label': 'Checkbox demo' } };
const Transition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
  });

function ProgramTemplate(options) {
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
  const label = { componentsProps: { input: { 'aria-label': 'Demo switch' } } };
  const [value2, onChange2] = useState(new Date());
    return (
        <div>
            <Box className={classes.btncol}>
                      <Button className={classes.addprovider} onClick={handleClickOpen}><BiPlusCircle className={classes.icon} /> Add New Program</Button>
                      </Box>
            <Box className={classes.Throw1}>
            <Box className={classes.Thcol5}>Name</Box>
            <Box className={classes.Thcol6}>Abbreviation</Box>
            <Box className={classes.Thcol8}>Start Date</Box>
            <Box className={classes.Thcol9}>End Date</Box>
            <Box className={classes.Thcol10}>Reimbursement Fee</Box>
            <Box className={classes.Thcol11}>Actions</Box>
            </Box>
            <Box className={classes.Tdrow1}>
            <Box className={classes.Tdcol5}>Cronic Care Management Program</Box>
            <Box className={classes.Tdcol6}>CCM</Box>
            <Box className={classes.Tdcol8}>05/08/2021</Box>
            <Box className={classes.Tdcol9}>07/09/2021</Box>
            <Box className={classes.Tdcol10}>500</Box>
            <Box className={classes.Tdcol11}><Button className={classes.EditBtn}>Edit</Button><Button className={classes.ActionBtn}>View</Button></Box>
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
            <Box className={classes.ModalTop}>
                <Typography variant="h3" className={classes.TopHeading}>Add New Program Template</Typography>
            <Button onClick={handleClose} className={classes.closebtn}><BiXCircle className={classes.closeicon} /></Button>
            </Box>
          <DialogContentText id="alert-dialog-slide-description">
          <Box className={classes.loginform}>
              <form>
              <Grid container spacing={5}>
                  <Grid item xs={12} sm={12}>
                      <Box className={classes.Formcol}>
                          <label>Program Name<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} placeholder="Enter Program Name"
                        type="text" style={{width:'70%'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Program Abbreviation<span style={{color:'#ff0000'}}>*</span></label>
                          <TextField className={classes.input} placeholder="Program Abbreviation"
                        type="text" style={{width:'70%'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Description</label>
                          <TextField className={classes.input} placeholder="Enter Program Description"
                        type="text" style={{width:'70%'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Reimbursement Fee</label>
                          <TextField className={classes.input} placeholder="Enter Reimbursement Fee"
                        type="number" style={{width:'70%'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                      <label>Start Date<span style={{color:'#ff0000'}}>*</span></label>
                      <DatePicker
        onChange={onChange2}
        value={value2} className={classes.input}
      /></Box>
                      <Box className={classes.Formcol}>
                      <label>End Date<span style={{color:'#ff0000'}}>*</span></label>
                      <DatePicker
        onChange={onChange2}
        value={value2} className={classes.input}
      /></Box>
      
                      <Box className={classes.Formrow}>
                      <Box className={classes.Formcol2} style={{marginBottom:0,}}>
                          <label style={{marginRight:15}}>Primary B-Code<span style={{color:'#ff0000'}}>*</span></label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="CPT44671" className={classes.select} style={{width:'90%'}} />
                      </Box> 
                      <Box className={classes.Formcol2} style={{marginBottom:0,}}>
                          <label style={{marginRight:15}}>Max Use<span style={{color:'#ff0000'}}>*</span></label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="1" className={classes.select} style={{width:'90%'}} />
                      </Box>
                      <Box className={classes.Formcol2} style={{marginBottom:0,}}>
                          <label style={{marginRight:15}}> Minimum Time<span style={{color:'#ff0000'}}>*</span></label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="30:00" className={classes.select} style={{width:'90%'}} />
                      </Box> 
                      </Box>
                      
                      <Box sx={{ flexGrow: 1 }}>
                         <Grid container spacing={2}>
                         <Grid item xs={12} md={12}>
                             <Typography variant="h3" style={{fontFamily:'Poppins',fontSize:18,color:'#000',fontWeight:'600',marginBottom:15,}}>Add-on Code</Typography>
                             <Box className={classes.Throw}>
                                 <Box className={classes.Thcol}><label style={{color:'#121212'}}>B-Code</label></Box>
                                 <Box className={classes.Thcol2}><label style={{color:'#121212'}}>Max Use</label></Box>
                                 <Box className={classes.Thcol3}><label style={{color:'#121212'}}> Minimum Time</label></Box>
                                 <Box className={classes.Thcol4}><Button className={classes.SubmitAdd}><BiPlus size="30" /></Button></Box>
                             </Box>
                             <Box className={classes.Tdrow}>
                             <Box className={classes.Tdcol}><Select options={options} onChange={(values) => this.setValues(values)} placeholder="CPT44671" className={classes.select} style={{width:'90%'}} /></Box>
                                 <Box className={classes.Tdcol2}><Select options={options} onChange={(values) => this.setValues(values)} placeholder="20:00" className={classes.select} style={{width:'90%'}} /></Box>
                                 <Box className={classes.Tdcol3}><Select options={options} onChange={(values) => this.setValues(values)} placeholder="2" className={classes.select} style={{width:'90%'}} /></Box>
                                 <Box className={classes.Tdcol4}><Button className={classes.removebtn}><BiMinus size="30" /></Button></Box>
                             </Box>
                             <Box className={classes.Tdrow}>
                             <Box className={classes.Tdcol}><Select options={options} onChange={(values) => this.setValues(values)} placeholder="CPT44671" className={classes.select} style={{width:'90%'}} /></Box>
                                 <Box className={classes.Tdcol2}><Select options={options} onChange={(values) => this.setValues(values)} placeholder="20:00" className={classes.select} style={{width:'90%'}} /></Box>
                                 <Box className={classes.Tdcol3}><Select options={options} onChange={(values) => this.setValues(values)} placeholder="2" className={classes.select} style={{width:'90%'}} /></Box>
                                 <Box className={classes.Tdcol4}><Button className={classes.removebtn}><BiMinus size="30" /></Button></Box>
                             </Box>
                         
                         </Grid>
                         <Grid item xs={7} md={7}>
                         <Box className={classes.Formcol2}>
                          <label>Max Billing Freq<span style={{color:'#ff0000'}}>*</span></label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Calendar Month" className={classes.select} style={{width:'200px'}} />
                      </Box> 
                       
                         </Grid>
                         <Grid item xs={7} md={7}>
                         <Box className={classes.Formcol2}>
                          <label>Max User Type</label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="MA" className={classes.select} style={{width:'200px'}} />
                      </Box> 
                       
                         </Grid>
                         <Grid item xs={7} md={7}>
                         <Box className={classes.Formcol2}>
                          <label>Chronic Condition Min</label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="0" className={classes.select} style={{width:'200px'}} />
                      </Box> 
                       
                         </Grid>
                         <Grid item xs={1} md={1}></Grid>
                         <Grid item xs={3} md={3}>
                         <Box className={classes.checkList}>
                              <label>Initial visit</label>
                              <Checkbox {...label} defaultChecked color="success" />
                          </Box>
                         </Grid>
                         <Grid item xs={7} md={7}>
                         <Box className={classes.Formcol2}>
                          <label>CarePlan Template</label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="CCM " className={classes.select} style={{width:'200px'}} />
                      </Box> 
                       
                         </Grid>
                         </Grid>
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
        </div>
    )
}

export default ProgramTemplate
const useStyles = makeStyles(() => ({
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
    SubmitAdd:{
        background:'#1612C6',
        borderRadius:50,
        height:30,
        minWidth:30,
        color:'#fff',
        fontFamily:'Poppins',
        fontWeight:'600',
        width:30,
        fontSize:20,
        display:'flex',
        justifyContent:'center',
        alignItems:'center',
        textTransform:'capitalize',
        '&:hover':{
            background:'#0A70E8'
        }
    },
    removebtn:{
        background:'#DF0909',
        borderRadius:50,
        height:30,
        color:'#fff',
        fontFamily:'Poppins',
        width:30,
        minWidth:30,
        fontWeight:'600',
        fontSize:20,
        textTransform:'capitalize',
        display:'flex',
        justifyContent:'center',
        alignItems:'center',
        '&:hover':{
            background:'#0A70E8'
        }
    },
    Formrow:{
        display:'flex',
        flexDirection:'row',
        justifyContent:'space-between',
        marginBottom:20,
    },
    Throw:{
        display:'flex',
        flexDirection:'row',
        alignItems:'center',
        marginBottom:15
    },
    Tdrow:{
        display:'flex',
        flexDirection:'row',
        alignItems:'center',
        marginBottom:15,
    },
    Throw1:{
        display:'flex',
        flexDirection:'row',
        alignItems:'center',
        borderBottom:'1px rgba(0,0,0,0.1) solid',
        paddingBottom:5,
    },
    Tdrow1:{
        display:'flex',
        flexDirection:'row',
        alignItems:'center',
        marginBottom:15,
        borderBottom:'1px rgba(0,0,0,0.1) solid',
        padding:'10px 0'
    },
    Thcol:{
        width:'40%'
    },
    Thcol2:{
        width:'25%'
    },
    Thcol3:{
        width:'25%'
    },
    Thcol4:{
        width:'10%'
    },
    Thcol5:{
        width:'25%',
        fontSize:16,
        color:'#696969'
    },
    Thcol6:{
        width:'14%',
        fontSize:16,
        color:'#696969'
    },
    Thcol7:{
        width:'14%',
        fontSize:16,
        color:'#696969'
    },
    Thcol8:{
        width:'14%',
        fontSize:16,
        color:'#696969'
    },
    Thcol9:{
        width:'14%',
        fontSize:16,
        color:'#696969'
    },
    Thcol10:{
        width:'20%',
        fontSize:16,
        color:'#696969'
    },
    Thcol11:{
        width:'14%',
        fontSize:16,
        color:'#696969',
        display:'flex',
        justifyContent:'flex-end'
    },
    Tdcol:{
        width:'40%'
    },
    Tdcol2:{
        width:'25%'
    },
    Tdcol3:{
        width:'25%'
    },
    Tdcol4:{
        width:'10%'
    },
    Tdcol5:{
        width:'25%'
    },
    Tdcol6:{
        width:'14%'
    },
    Tdcol7:{
        width:'14%'
    },
    Tdcol8:{
        width:'14%'
    },
    Tdcol9:{
        width:'14%'
    },
    Tdcol10:{
        width:'20%'
    },
    Tdcol11:{
        width:'14%',
        display:'flex',
        justifyContent:'flex-end'
    },
    ModalTop:{
        display:'flex',
        flexDirection:'row',
        alignItems:'center',
        justifyContent:'space-between',
        marginBottom:25,
        
    },
    checkCol:{
        display:'flex',
        flexDirection:'row',
        flexWrap:'wrap',
        marginBottom:40,
    },
    checkList:{
        alignItems:'center',
        justifyContent:'flex-start',
        display:'flex',
        '& label':{
            flex:'0 0 160px !important',
            color:'#141621',
            marginTop:'0px !important'
        }
    },
    ActionBtn:{
        borderRadius:10,
        textTransform:'capitalize',
        background:'#0A70E8',
        color:'#fff',
        '&:hover':{
            background:'rgba(0,0,0,0.8)'
        }
    },
    EditBtn:{
        borderRadius:10,
        textTransform:'capitalize',
        background:'#E8740A',
        color:'#fff',
        marginRight:10,
        '&:hover':{
            background:'rgba(0,0,0,0.8)'
        }
    },
    TopHeading:{
        fontFamily:'Poppins',
        fontSize:20,
        fontWeight:'600'
    },
    addprovider:{
        fontSize:16,
        textTransform:'capitalize',
        color:'#7087A7',
        '&:hover':{
            background:'none',
            color:'#000'
        }
    },
    btncol:{
        marginTop:15,
        display:'flex',
        justifyContent:'flex-end',
        width:'100%',
        marginBottom:20,
    },
    icon:{
        color:'#7087A7',
        fontSize:'24px',
        marginRight:'15px'
      },
    backarrow:{
        color:'#8088A8',
        fontSize:'20px',
        marginRight:'8px'
    },
    Formcol:{
        display:'flex',
        alignItems:'flex-start',
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
            fontWeight:'400',
            marginTop:10,
        },
        '& .react-dropdown-select-input':{
            width:'100%'
        }
    },
    input:{ 
        border:'none',
        borderRadius:'10px',
        height:'50px',
        width:'100%',
    },
    Formcol2:{
        display:'flex',
        alignItems:'center',
        justifyContent:'space-between',
        flexDirection:'row',
        marginBottom:'5px',
        '& label':{
            color:'#000',
            fontSize:'15px',
            fontWeight:'400',
        },
    },
    modal:{
        '& .MuiPaper-rounded':{
            borderRadius:'10px !important',
            padding:'20px',
            width:'776px',
            maxWidth:'776px'
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
        width:'142px',
        height:'45px',
        borderRadius:'10px',
        color:'#fff',
        marginTop:'20px',
        '&:hover':{
            background:'#333'
        }
    },
}));