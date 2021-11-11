#status
1 - success 
2 - cancel
3 - deliver
4 - error

platform
1 - kotak

<!-- 2 column grid layout with text inputs for the first and last names -->

                    <div class="row mb-1">
                        <div class="col">
                            <label class="form-label" for="whatsapp">Whatsapp Number<sup class="text-danger">*</sup></label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+91</span>
                                </div>
                                <input type="tel" id="whatsapp" class="form-control" placeholder="Enter Number" name="whatsapp" value="<?= isset($data['whatsapp']) ? $data['whatsapp'] : ''; ?>" minlength="10" maxlength="10" pattern="^[6789]\d{9}$" aria-label="whatsapp" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="pincode">Pincode</label>
                                <input type="number" id="pincode" class="form-control" name="pincode" value="<?= isset($data['pincode']) ? $data['pincode'] : ''; ?>" minlength="6" maxlength="6" />
                            </div>
                        </div>
                    </div>

                    <!--Text input -->
                    <div class="form-outline mb-1">
                        <label class="form-label" for="subhead">Address<sup class="text-danger">*</sup> </label>
                        <input type="text" id="address" class="form-control" name="address" value="<?= isset($data['address']) ? $data['address'] : ''; ?>" required />
                    </div>

                    <!--Text input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Firm Logo<sup class="text-danger">*</sup></label>
                        <input type="file" id="form6Example1" class="form-control" name="img" value="<?= isset($data['link']) ? $data['img'] : ''; ?>" accept="image/*" required />

                        <!--data id -->
                        <input type="hidden" name="dataid" value="<?= isset($data['id']) ? $data['id'] : ''; ?>">
                    </div>



                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Name<sup class="text-danger">*</sup></label>
                                <input type="text" id="form6Example1" class="form-control" name="userName" value="<?= isset($data['name']) ? $data['name'] : ''; ?>" required />


                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="email">Email<sup class="text-danger">*</sup></label>
                                <input type="email" id="email" class="form-control" name="email" value="<?= isset($data['email']) ? $data['email'] : ''; ?>" required />
                            </div>
                        </div>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-1">

                        <div class="col">
                            <label class="form-label" for="number">Number<sup class="text-danger">*</sup></label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+91</span>
                                </div>
                                <input type="tel" id="number" class="form-control" placeholder="Enter Number" name="number" value="<?= isset($data['number']) ? $data['number'] : ''; ?>" minlength="10" maxlength="10" pattern="^[6789]\d{9}$" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Location Link<sup class="text-danger">*</sup></label>
                                <input type="text" id="form6Example2" class="form-control" name="location_link" value="<?= isset($data['location_link']) ? $data['location_link'] : ''; ?>" required />
                            </div>
                        </div>
                    </div>
