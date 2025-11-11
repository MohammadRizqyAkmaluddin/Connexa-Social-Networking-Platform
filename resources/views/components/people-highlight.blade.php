
<div class="d-flex justify-content-between">
                        <div class="d-block">
                            <h2 class="fs-6 mb-4">employees who active and verified in connexa</h2>
                            <div class="d-flex">
                                <div class="d-block">
                                    <div class="d-flex">
                                        @foreach($company->experiences->take(4) as $user)
                                            <img src="{{ asset('IMG/uploads/profile/' . $user->user->profile_image) }}" width="50" height="50" class="rounded-circle img-general">
                                        @endforeach
                                        <p class="d-flex border rounded-circle align-items-center justify-content-center fs-8" style="width: 50px; height:50px;">{{ $binusStudent->count() }}+</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        @foreach($company->experiences->take(4) as $user)
                                            <p class="fs-12">{{ explode(' ', $user->user->name)[1] ?? $user->user->name }},</p>
                                        @endforeach
                                        <p class="fs-12">& others</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block">
                            <h2 class="fs-6 mb-4">employees who studied at Binus University</h2>
                            <div class="d-flex">
                                <div class="d-block">
                                    <div class="d-flex">
                                        @foreach($binusStudent->take(4) as $user)
                                            <img src="{{ asset('IMG/uploads/profile/' . $user->profile_image) }}" width="50" height="50" class="rounded-circle img-general">
                                        @endforeach
                                        <p class="d-flex border rounded-circle align-items-center justify-content-center fs-8" style="width: 50px; height:50px;">{{ $binusStudent->count() }}+</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        @foreach($binusStudent->take(4) as $user)
                                            <p class="fs-12">{{ explode(' ', $user->name)[1] ?? $user->name }},</p>
                                        @endforeach
                                        <p class="fs-12">& others</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block">
                            <h2 class="fs-6 mb-4">employees who studied at Harvard University</h2>
                            <div class="d-flex">
                                <div class="d-block">
                                    <div class="d-flex">
                                        @foreach($harvardStudent->take(4) as $user)
                                            <img src="{{ asset('IMG/uploads/profile/' . $user->profile_image) }}" width="50" height="50" class="rounded-circle img-general">
                                        @endforeach
                                        <p class="d-flex border rounded-circle align-items-center justify-content-center fs-8" style="width: 50px; height:50px;">{{ $harvardStudent->count() }}+</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        @foreach($harvardStudent->take(4) as $user)
                                            <p class="fs-12">{{ explode(' ', $user->name)[1] ?? $user->name }},</p>
                                        @endforeach
                                        <p class="fs-12">& others</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
